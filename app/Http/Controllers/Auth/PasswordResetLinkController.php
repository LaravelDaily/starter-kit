<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && !empty($user->two_factor_secret)) {
            // 2FA is enabled, redirect to 2FA verification page
            $request->session()->put('password_reset_email', $user->email);
            return redirect()->route('password.two-factor');
        }

        Password::sendResetLink($request->only('email'));

        return back()->with('status', __('A reset link will be sent if the account exists.'));
    }
}
