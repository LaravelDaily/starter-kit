<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Two Factor Authentication') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (! $enabled)
                    {{-- Enable 2FA --}}
                    <form method="POST" action="{{ route('settings.two-factor.enable') }}">
                        @csrf
                        <x-button type="primary" buttonType="submit">
                            {{ __('Enable Two-Factor Authentication') }}
                        </x-button>
                    </form>
                @else
                    @if ($showingQrCode)
                        <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                            <p class="font-semibold">
                                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                            </p>
                        </div>

                        <div class="mt-4">
                            {!! $qrCode !!}
                        </div>
                    @endif

                    @if ($showingRecoveryCodes)
                        <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                            <p class="font-semibold">
                                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                            </p>
                        </div>

                        <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:bg-gray-700 rounded-lg">
                            @foreach (json_decode(decrypt($user->two_factor_recovery_codes), true) as $code)
                                <div>{{ $code }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-4 flex items-center">
                        @if (! $showingRecoveryCodes)
                            <form method="POST" action="{{ route('settings.two-factor.recovery-codes') }}" class="inline">
                                @csrf
                                <x-button type="primary" buttonType="submit">
                                    {{ __('Show Recovery Codes') }}
                                </x-button>
                            </form>
                        @endif

                        <form method="POST" action="{{ route('settings.two-factor.regenerate') }}" class="inline ml-4">
                            @csrf
                            <x-button type="primary" buttonType="submit">
                                {{ __('Regenerate Recovery Codes') }}
                            </x-button>
                        </form>

                        <form method="POST" action="{{ route('settings.two-factor.disable') }}" class="inline ml-4">
                            @csrf
                            <x-button type="danger" buttonType="submit">
                                {{ __('Disable Two-Factor Authentication') }}
                            </x-button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app> 