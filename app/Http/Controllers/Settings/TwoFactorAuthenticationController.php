<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\TwoFactorAuthenticationRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Laravel\Fortify\Features;

class TwoFactorAuthenticationController extends Controller implements HasMiddleware
{
    /*
     * Get the middleware that should be assigned to the controller.
     * */
    public static function middleware(): array
    {
        return Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
            ? [new Middleware('password.confirm', only: ['show'])]
            : [];
    }

    /*
     * Show the user's two-factor authentication settings page.
     * */
    public function show(TwoFactorAuthenticationRequest $request): View
    {
        return view('settings.two-factor', [
            'twoFactorEnabled' => $request->user()->hasEnabledTwoFactorAuthentication(),
            'requiresConfirmation' => Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
        ]);

    }
}
