<x-layouts.app>
    <!-- Breadcrumbs -->
    <div class="mb-6 flex items-center text-sm">
        <a href="{{ route('dashboard') }}"
            class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('Dashboard') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="{{ route('settings.profile.edit') }}"
            class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('Settings') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-500 dark:text-gray-400">{{ __('Two-Factor Authentication') }}</span>
    </div>

    <!-- Page Title -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Two-Factor Authentication') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Add additional security to your account using two-factor authentication') }}</p>
    </div>

    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar Navigation -->
            @include('settings.partials.navigation')

            <!-- Two-Factor Content -->
            <div class="flex-1">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div x-data="twoFactorAuth" class="max-w-2xl">
                            @if ($twoFactorEnabled)
                                <!-- Two-Factor is Enabled -->
                                <div class="mb-6">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-green-100 dark:bg-green-900">
                                            <svg class="h-4 w-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                                                {{ __('Two-Factor Authentication is Enabled') }}
                                            </h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Your account is protected with two-factor authentication.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Recovery Codes Section -->
                                <div class="mb-6 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                                    <h4 class="font-medium text-yellow-800 dark:text-yellow-200 mb-2">
                                        {{ __('Recovery Codes') }}
                                    </h4>
                                    <p class="text-sm text-yellow-700 dark:text-yellow-300 mb-3">
                                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.') }}
                                    </p>
                                    
                                    <div x-show="recoveryCodes.length > 0" class="mb-3">
                                        <div class="bg-white dark:bg-gray-800 p-3 rounded border font-mono text-sm">
                                            <template x-for="code in recoveryCodes" :key="code">
                                                <div x-text="code" class="mb-1"></div>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <x-button 
                                            type="secondary" 
                                            size="sm"
                                            x-on:click="showRecoveryCodes"
                                            x-show="recoveryCodes.length === 0"
                                        >
                                            {{ __('Show Recovery Codes') }}
                                        </x-button>
                                        
                                        <x-button 
                                            type="secondary" 
                                            size="sm"
                                            x-on:click="regenerateRecoveryCodes"
                                            x-show="recoveryCodes.length > 0"
                                        >
                                            {{ __('Regenerate Recovery Codes') }}
                                        </x-button>
                                    </div>
                                </div>

                                <!-- Disable Two-Factor -->
                                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">
                                        {{ __('Disable Two-Factor Authentication') }}
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                        {{ __('When two-factor authentication is disabled, you will only be asked for a password when logging in.') }}
                                    </p>
                                    <x-button 
                                        type="danger" 
                                        x-on:click="disableTwoFactor"
                                        x-bind:disabled="disabling"
                                    >
                                        <span x-show="!disabling">{{ __('Disable') }}</span>
                                        <span x-show="disabling">{{ __('Disabling...') }}</span>
                                    </x-button>
                                </div>
                            @else
                                <!-- Two-Factor is Disabled -->
                                <div class="mb-6">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-100 dark:bg-gray-700">
                                            <svg class="h-4 w-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                                                {{ __('Two-Factor Authentication') }}
                                            </h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Add additional security to your account using two-factor authentication.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Setup Instructions -->
                                <div x-show="!enabling" class="mb-6">
                                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                                        {{ __('When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                                    </p>
                                    <x-button type="primary" x-on:click="enableTwoFactor">
                                        {{ __('Enable Two-Factor Authentication') }}
                                    </x-button>
                                </div>

                                <!-- QR Code Setup -->
                                <div x-show="enabling" class="space-y-6">
                                    <div>
                                        <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">
                                            {{ __('Finish enabling two-factor authentication.') }}
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                            {{ __('To finish enabling two-factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                                        </p>
                                    </div>

                                    <!-- QR Code -->
                                    <div x-show="qrCode" class="text-center">
                                        <div class="inline-block p-4 bg-white rounded-lg border">
                                            <div id="qr-code-container"></div>
                                        </div>
                                    </div>

                                    <!-- Setup Key -->
                                    <div x-show="setupKey">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('Setup Key') }}
                                        </label>
                                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded border font-mono text-sm break-all" x-text="setupKey"></div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            {{ __('Enter this key manually if you cannot scan the QR code.') }}
                                        </p>
                                    </div>

                                    <!-- Confirmation Code -->
                                    <form x-on:submit.prevent="confirmTwoFactor">
                                        <div class="mb-4">
                                            <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                {{ __('Code') }}
                                            </label>
                                            <input 
                                                type="text" 
                                                id="code"
                                                x-model="confirmationCode"
                                                placeholder="000000"
                                                maxlength="6"
                                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 text-center text-lg tracking-widest"
                                                required
                                            >
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                {{ __('Enter the 6-digit code from your authenticator app to confirm setup.') }}
                                            </p>
                                        </div>
                                        
                                        <div class="flex gap-2">
                                            <x-button 
                                                type="primary" 
                                                x-bind:disabled="confirming || !confirmationCode"
                                            >
                                                <span x-show="!confirming">{{ __('Confirm') }}</span>
                                                <span x-show="confirming">{{ __('Confirming...') }}</span>
                                            </x-button>
                                            
                                            <x-button 
                                                type="secondary" 
                                                x-on:click="cancelTwoFactor"
                                                x-bind:disabled="confirming"
                                            >
                                                {{ __('Cancel') }}
                                            </x-button>
                                        </div>
                                    </form>

                                    <!-- Recovery Codes Display -->
                                    <div x-show="recoveryCodes.length > 0" class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                                        <h4 class="font-medium text-green-800 dark:text-green-200 mb-2">
                                            {{ __('Recovery Codes') }}
                                        </h4>
                                        <p class="text-sm text-green-700 dark:text-green-300 mb-3">
                                            {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.') }}
                                        </p>
                                        <div class="bg-white dark:bg-gray-800 p-3 rounded border font-mono text-sm">
                                            <template x-for="code in recoveryCodes" :key="code">
                                                <div x-text="code" class="mb-1"></div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('twoFactorAuth', () => ({
                enabling: false,
                confirming: false,
                disabling: false,
                qrCode: null,
                setupKey: null,
                recoveryCodes: [],
                confirmationCode: '',

                async enableTwoFactor() {
                    this.enabling = true;
                    
                    try {
                        const response = await fetch('/user/two-factor-authentication', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        if (response.ok) {
                            await this.showQrCode();
                        } else {
                            throw new Error('Failed to enable two-factor authentication');
                        }
                    } catch (error) {
                        // Log minimal error information
                        console.error('Error enabling 2FA');
                        alert('{{ __("An error occurred while enabling two-factor authentication.") }}');
                        this.enabling = false;
                    }
                },

                async showQrCode() {
                    try {
                        const response = await fetch('/user/two-factor-qr-code');
                        const data = await response.json();
                        
                        // Safely insert QR code SVG
                        const container = document.getElementById('qr-code-container');
                        if (container && data.svg) {
                            // Create a temporary div to parse the SVG
                            const tempDiv = document.createElement('div');
                            tempDiv.innerHTML = data.svg;
                            const svgElement = tempDiv.querySelector('svg');
                            
                            if (svgElement) {
                                container.innerHTML = '';
                                container.appendChild(svgElement);
                                this.qrCode = true; // Set flag to show the container
                            }
                        }
                        
                        const secretResponse = await fetch('/user/two-factor-secret-key');
                        const secretData = await secretResponse.json();
                        this.setupKey = secretData.secretKey;
                    } catch (error) {
                        console.error('Error fetching QR code');
                    }
                },

                async confirmTwoFactor() {
                    this.confirming = true;
                    
                    try {
                        const response = await fetch('/user/confirmed-two-factor-authentication', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                code: this.confirmationCode
                            })
                        });

                        if (response.ok) {
                            await this.showRecoveryCodes();
                            window.location.reload();
                        } else {
                            throw new Error('Invalid confirmation code');
                        }
                    } catch (error) {
                        console.error('Error confirming 2FA');
                        alert('{{ __("The provided two factor authentication code was invalid.") }}');
                    }
                    
                    this.confirming = false;
                },

                async cancelTwoFactor() {
                    try {
                        await fetch('/user/two-factor-authentication', {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });
                        
                        this.enabling = false;
                        this.qrCode = null;
                        this.setupKey = null;
                        this.confirmationCode = '';
                    } catch (error) {
                        console.error('Error canceling 2FA');
                    }
                },

                async disableTwoFactor() {
                    if (!confirm('{{ __("Are you sure you want to disable two-factor authentication?") }}')) {
                        return;
                    }
                    
                    this.disabling = true;
                    
                    try {
                        const response = await fetch('/user/two-factor-authentication', {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        if (response.ok) {
                            window.location.reload();
                        } else {
                            throw new Error('Failed to disable two-factor authentication');
                        }
                    } catch (error) {
                        console.error('Error disabling 2FA');
                        alert('{{ __("An error occurred while disabling two-factor authentication.") }}');
                    }
                    
                    this.disabling = false;
                },

                async showRecoveryCodes() {
                    try {
                        const response = await fetch('/user/two-factor-recovery-codes');
                        const data = await response.json();
                        this.recoveryCodes = data;
                    } catch (error) {
                        console.error('Error fetching recovery codes');
                    }
                },

                async regenerateRecoveryCodes() {
                    if (!confirm('{{ __("Are you sure you want to regenerate recovery codes? This will invalidate all existing codes.") }}')) {
                        return;
                    }
                    
                    try {
                        const response = await fetch('/user/two-factor-recovery-codes', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });
                        
                        const data = await response.json();
                        this.recoveryCodes = data;
                    } catch (error) {
                        console.error('Error regenerating recovery codes');
                        alert('{{ __("An error occurred while regenerating recovery codes.") }}');
                    }
                }
            }));
        });
    </script>
</x-layouts.app>