<div class="w-full md:w-64 shrink-0 border-r border-gray-200 dark:border-gray-700 pr-4">
    <nav class="bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden">
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            <li>
                <x-tab href="{{ route('settings.profile.edit') }}"
                    active="{{ request()->routeIs('settings.profile.*') }}">
                    {{ __('Profile') }}
                </x-tab>
            </li>
            <li>
                <x-tab href="{{ route('settings.password.edit') }}"
                    active="{{ request()->routeIs('settings.password.*') }}">
                    {{ __('Password') }}
                </x-tab>
            </li>
            <li>
                <x-tab href="{{ route('settings.appearance.edit') }}"
                    active="{{ request()->routeIs('settings.appearance.*') }}">
                    {{ __('Appearance') }}
                </x-tab>
            </li>
        </ul>
    </nav>
</div>
