<x-layouts.auth :title="__('Reset Password')">
    <!-- Reset Password Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Reset Password') }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Enter your email and new password below.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <!-- Email Input -->
                <div class="mb-4">
                    <x-forms.input name="email" type="email" label="Email"
                        value="{{ old('email', request('email')) }}" placeholder="your@email.com" />
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <x-forms.input name="password" type="password" label="Password" placeholder="••••••••" />
                </div>

                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <x-forms.input name="password_confirmation" type="password" label="Confirm Password"
                        placeholder="••••••••" />
                </div>

                <!-- Reset Password Button -->
                <x-button type="primary" buttonType="submit" class="w-full">
                    {{ __('Reset Password') }}
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
