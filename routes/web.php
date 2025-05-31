<?php

use App\Http\Controllers\Settings;
use App\Http\Controllers\TwoFactorAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
    Route::get('settings/two-factor', [Settings\TwoFactorController::class, 'edit'])->name('settings.two-factor.edit');
    Route::post('settings/two-factor', [Settings\TwoFactorController::class, 'enable'])->name('settings.two-factor.enable');
    Route::post('settings/two-factor/recovery-codes', [Settings\TwoFactorController::class, 'showRecoveryCodes'])->name('settings.two-factor.recovery-codes');
    Route::post('settings/two-factor/disable', [Settings\TwoFactorController::class, 'disable'])->name('settings.two-factor.disable');
    Route::post('settings/two-factor/verify-otp-and-enable', [Settings\TwoFactorController::class, 'verifyOtpAndEnable'])->name('settings.two-factor.verify-otp-and-enable');
});

require __DIR__.'/auth.php';
