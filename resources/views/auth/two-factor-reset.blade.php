<x-layouts.auth :title="__('Two-Factor Authentication')">
    <!-- Two-Factor Authentication Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Two-Factor Authentication') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2 mb-6">
            {{ __('Please enter your authenticator code or one of your recovery codes to proceed with password reset.') }}
        </p>

        <form method="POST" action="{{ route('password.two-factor.store') }}">
            @csrf
            <div class="space-y-4 mb-6">
                <x-forms.input name="two_factor_code" type="text" label="Authenticator Code" placeholder="Enter your authenticator code" />
                <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-2 bg-white dark:bg-gray-800 text-sm text-gray-500 dark:text-gray-400">OR</span>
                    </div>
                </div>
                <x-forms.input name="recovery_code" type="text" label="Recovery Code" placeholder="Enter your recovery code" />
            </div>

            <x-button type="primary" class="w-full">
                {{ __('Verify Code') }}
            </x-button>
        </form>
    </div>
</x-layouts.auth> 