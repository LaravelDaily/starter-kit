<x-layouts.auth :title="__('Forgot Password')">
    <!-- Forgot Password Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Forgot Password') }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    {{ __('Enter your email to receive a password reset link') }}</p>
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Input -->
                <div class="mb-4">
                    <x-forms.input name="email" type="email" label="Email" placeholder="your@email.com" />
                </div>

                <!-- Send Reset Link Button -->
                <x-button type="primary" buttonType="submit" class="w-full">
                    {{ __('Send Password Reset Link') }}
                </x-button>
            </form>

            <!-- Back to Login Link -->
            <div class="text-center mt-6">
                <a href="{{ route('login') }}"
                    class="text-blue-600 dark:text-blue-400 hover:underline font-medium">{{ __('Back to login') }}</a>
            </div>
        </div>
    </div>
</x-layouts.auth>
