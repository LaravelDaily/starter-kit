<x-layouts.auth :title="__('Verify Email')">
    <!-- Verify Email Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Verify Your Email Address') }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    {{ __('Before proceeding, please check your email for a verification link.') }}<br>
                    {{ __('If you did not receive the email, you can request another below.') }}
                </p>
            </div>

            @if (session('status') === 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.store') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <div class="text-center mt-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                        {{ __('Log out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.auth>
