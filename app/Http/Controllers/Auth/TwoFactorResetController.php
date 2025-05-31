<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\TwoFactorAuthenticationProvider;
use Illuminate\Support\Facades\Password;

class TwoFactorResetController extends Controller
{
    public function create(Request $request): View | RedirectResponse
    {
        // Ensure email is in session
        if (! $request->session()->has('password_reset_email')) {
            return redirect()->route('password.request');
        }

        return view('auth.two-factor-reset');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'two_factor_code' => ['nullable', 'string'],
            'recovery_code' => ['nullable', 'string'],
        ], [
            'two_factor_code.required_without' => 'Please enter either an authenticator code or a recovery code.',
            'recovery_code.required_without' => 'Please enter either an authenticator code or a recovery code.',
        ]);

        $email = $request->session()->get('password_reset_email');
        $user = User::where('email', $email)->first();

        if (! $user) {
            throw ValidationException::withMessages([
                'email' => __('We could not find a user with that email address.'),
            ]);
        }

        if ($request->filled('recovery_code')) {
            $recoveryCodes = json_decode(decrypt($user->two_factor_recovery_codes), true);
            
            if (!in_array($request->recovery_code, $recoveryCodes)) {
                throw ValidationException::withMessages([
                    'recovery_code' => __('Invalid recovery code.'),
                ]);
            }

            $recoveryCodes = array_diff($recoveryCodes, [$request->recovery_code]);
            $user->two_factor_recovery_codes = encrypt(json_encode(array_values($recoveryCodes)));
            $user->save();
        } elseif ($request->filled('two_factor_code')) {
            try {
                $provider = app(TwoFactorAuthenticationProvider::class);
                if (!$provider->verify(decrypt($user->two_factor_secret), $request->two_factor_code)) {
                    throw ValidationException::withMessages([
                        'two_factor_code' => __('Invalid two-factor authentication code.'),
                    ]);
                }
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'two_factor_code' => __('Invalid two-factor authentication code.'),
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'two_factor_code' => __('Please enter either an authenticator code or a recovery code.'),
            ]);
        }

        // 2FA verification successful, now send the password reset link
        Password::sendResetLink(['email' => $email]);

        $request->session()->forget('password_reset_email');

        return redirect()->route('login')->with('status', __('A reset link will be sent if the account exists.'));
    }
} 