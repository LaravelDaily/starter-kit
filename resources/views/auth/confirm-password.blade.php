<x-layouts.auth :title="__('Confirm Password')">
    <!-- Confirm Password Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Confirm Password') }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    {{ __('Please confirm your password before continuing.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <!-- Password Input -->
                <div class="mb-4">
                    <x-forms.input name="password" type="password" label="Password" placeholder="••••••••" />
                </div>

                <!-- Confirm Button -->
                <x-button type="primary" buttonType="submit" class="w-full">
                    {{ __('Confirm Password') }}
                </x-button>
            </form>

            <!-- Forgot Password Link -->
            <div class="text-center mt-6">
                <a href="{{ route('password.request') }}"
                    class="text-blue-600 dark:text-blue-400 hover:underline font-medium">{{ __('Forgot your password?') }}</a>
            </div>
        </div>
    </div>
</x-layouts.auth>
