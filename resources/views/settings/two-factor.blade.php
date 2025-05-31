<x-layouts.app>
    <!-- Breadcrumbs -->
    <div class="mb-6 flex items-center text-sm">
        <a href="{{ route('dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('Dashboard') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="{{ route('settings.profile.edit') }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('Profile') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-500 dark:text-gray-400">{{ __('Two Factor Authentication') }}</span>
    </div>

    <!-- Page Title -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Two Factor Authentication') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Manage your two-factor authentication settings.') }}</p>
    </div>
    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-6">
            @include('settings.partials.navigation')
            <div class="flex-1">
                @include('settings.partials.two-factor-section', [
                    'enabled' => $enabled,
                    'showingQrCode' => $showingQrCode,
                    'showingRecoveryCodes' => $showingRecoveryCodes,
                    'qrCode' => $qrCode,
                    'user' => $user,
                ])
            </div>
        </div>
    </div>
</x-layouts.app> 