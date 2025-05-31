<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Laravel\Fortify\Actions\ValidateTwoFactorAuthentication;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorEnabledNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TwoFactorController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        $enabled = !empty($user->two_factor_secret);
        $showingQrCode = session('showingQrCode', false);
        $showingRecoveryCodes = session('showingRecoveryCodes', false);
        $qrCode = $enabled ? $user->twoFactorQrCodeSvg() : null;

        return view('settings.two-factor', compact('enabled', 'showingQrCode', 'showingRecoveryCodes', 'qrCode', 'user'));
    }

    public function enable(Request $request, EnableTwoFactorAuthentication $enable, GenerateNewRecoveryCodes $generate)
    {
        $user = $request->user();

        // Generate and store OTP
        $otp = rand(100000, 999999);
        Cache::put('2fa_otp_' . $user->id, $otp, now()->addMinutes(10)); // Store for 10 minutes

        // Send OTP email
        Mail::to($user->email)->send(new \App\Mail\TwoFactorOtpNotification($otp)); // We'll create this Mailable next

        return redirect()->route('settings.two-factor.edit')->with(['otpSent' => true]);
    }

    public function verifyOtpAndEnable(Request $request, EnableTwoFactorAuthentication $enable, GenerateNewRecoveryCodes $generate)
    {
        $request->validate([
            'otp' => ['required', 'numeric'],
        ]);

        $user = $request->user();
        $storedOtp = Cache::get('2fa_otp_' . $user->id);

        if (! $storedOtp || $request->otp != $storedOtp) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'otp' => __('Invalid or expired OTP.'),
            ]);
        }

        // OTP is valid, proceed with 2FA enablement
        Cache::forget('2fa_otp_' . $user->id);

        $enable($user);
        $generate($user);

        return redirect()->route('settings.two-factor.edit')->with(['showingQrCode' => true, 'showingRecoveryCodes' => true, 'status' => __('Two-factor authentication enabled successfully.')]);
    }

    public function showRecoveryCodes(Request $request, GenerateNewRecoveryCodes $generate)
    {
        $generate($request->user());
        return redirect()->route('settings.two-factor.edit')->with([
            'showingRecoveryCodes' => true,
        ]);
    }

    public function disable(Request $request, DisableTwoFactorAuthentication $disable)
    {
        $request->validate([
            'two_factor_code' => ['nullable', 'string'],
            'recovery_code' => ['nullable', 'string'],
        ], [
            'two_factor_code.required_without' => 'Please enter either an authenticator code or a recovery code.',
            'recovery_code.required_without' => 'Please enter either an authenticator code or a recovery code.',
        ]);

        $user = $request->user();

        if ($request->filled('recovery_code')) {
            // Verify recovery code
            $recoveryCodes = json_decode(decrypt($user->two_factor_recovery_codes), true);
            
            if (!in_array($request->recovery_code, $recoveryCodes)) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'recovery_code' => __('Invalid recovery code.'),
                ]);
            }

            // Remove the used recovery code
            $recoveryCodes = array_diff($recoveryCodes, [$request->recovery_code]);
            $user->two_factor_recovery_codes = encrypt(json_encode(array_values($recoveryCodes)));
            $user->save();
        } elseif ($request->filled('two_factor_code')) {
            try {
                // Use Fortify's TwoFactorAuthenticationProvider
                $provider = app(\Laravel\Fortify\TwoFactorAuthenticationProvider::class);
                if (!$provider->verify(decrypt($user->two_factor_secret), $request->two_factor_code)) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        'two_factor_code' => __('Invalid two-factor authentication code.'),
                    ]);
                }
            } catch (\Exception $e) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'two_factor_code' => __('Invalid two-factor authentication code.'),
                ]);
            }
        } else {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'two_factor_code' => __('Please enter either an authenticator code or a recovery code.'),
            ]);
        }

        $disable($user);

        return redirect()->route('settings.two-factor.edit')->with('status', __('Two-factor authentication disabled successfully.'));
    }
} 