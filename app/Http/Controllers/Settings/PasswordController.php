<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Laravel\Fortify\TwoFactorAuthenticationProvider;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function edit(Request $request): View
    {
        return view('settings.password', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $rules = [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Rules\Password::defaults(), 'confirmed'],
        ];

        if (!empty($user->two_factor_secret)) {
            $rules['two_factor_code'] = ['nullable', 'string'];
            $rules['recovery_code'] = ['nullable', 'string'];
        }

        $validated = $request->validate($rules, [
            'two_factor_code.required_without' => 'Please enter either an authenticator code or a recovery code.',
            'recovery_code.required_without' => 'Please enter either an authenticator code or a recovery code.',
        ]);

        if (!empty($user->two_factor_secret)) {
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
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
