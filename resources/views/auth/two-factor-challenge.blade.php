<x-layouts.auth :title="__('Two-Factor Challenge')">
    <!-- Two-Factor Challenge Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="mb-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 mb-4">
                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Two-Factor Authentication') }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </p>
            </div>

            <form method="POST" action="{{ url('/two-factor-challenge') }}" class="space-y-4">
                @csrf

                <div x-data="{ recovery: false }">
                    <!-- Authentication Code Input -->
                    <div x-show="! recovery">
                        <x-forms.input 
                            label="Authentication Code" 
                            name="code" 
                            type="text" 
                            placeholder="000000"
                            autofocus 
                            autocomplete="one-time-code"
                            maxlength="6"
                            class="text-center text-lg tracking-widest"
                        />
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ __('Enter the 6-digit code from your authenticator app.') }}
                        </p>
                    </div>

                    <!-- Recovery Code Input -->
                    <div x-show="recovery">
                        <x-forms.input 
                            label="Recovery Code" 
                            name="recovery_code" 
                            type="text" 
                            placeholder="recovery-code"
                            autocomplete="one-time-code"
                            class="text-center"
                        />
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ __('Enter one of your emergency recovery codes.') }}
                        </p>
                    </div>

                    <!-- Toggle Recovery Mode -->
                    <div class="flex items-center justify-between mt-4">
                        <button 
                            type="button" 
                            class="text-sm text-blue-600 dark:text-blue-400 hover:underline"
                            x-show="! recovery"
                            x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })"
                        >
                            {{ __('Use a recovery code') }}
                        </button>

                        <button 
                            type="button" 
                            class="text-sm text-blue-600 dark:text-blue-400 hover:underline"
                            x-show="recovery"
                            x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })"
                        >
                            {{ __('Use an authentication code') }}
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <x-button type="primary" class="w-full mt-6">
                        {{ __('Verify') }}
                    </x-button>
                </div>
            </form>

            <!-- Back to Login -->
            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                    {{ __('Back to login') }}
                </a>
            </div>
        </div>
    </div>
</x-layouts.auth>