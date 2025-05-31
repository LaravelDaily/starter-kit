@props(['enabled' => false])

<div>
    @if (! $enabled)
        {{-- Enable 2FA --}}
        <x-button type="button" wire:click="enableTwoFactorAuthentication">
            {{ __('Enable Two-Factor Authentication') }}
        </x-button>
    @else
        @if ($showingQrCode)
            <div class="mt-4 max-w-xl text-sm text-gray-600">
                <p class="font-semibold">
                    {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                </p>
            </div>

            <div class="mt-4">
                {!! $qrCode !!}
            </div>
        @endif

        @if ($showingRecoveryCodes)
            <div class="mt-4 max-w-xl text-sm text-gray-600">
                <p class="font-semibold">
                    {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                </p>
            </div>

            <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                    <div>{{ $code }}</div>
                @endforeach
            </div>
        @endif

        <div class="mt-4 flex items-center">
            @if (! $showingRecoveryCodes)
                <x-button type="button" wire:click="showRecoveryCodes">
                    {{ __('Show Recovery Codes') }}
                </x-button>
            @endif

            <x-button type="button" class="ml-4" wire:click="regenerateRecoveryCodes">
                {{ __('Regenerate Recovery Codes') }}
            </x-button>

            <x-button type="button" class="ml-4" wire:click="disableTwoFactorAuthentication">
                {{ __('Disable Two-Factor Authentication') }}
            </x-button>
        </div>
    @endif
</div> 