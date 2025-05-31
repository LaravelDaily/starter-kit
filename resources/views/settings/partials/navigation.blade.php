<div class="w-full md:w-64 shrink-0 border-r border-gray-200 dark:border-gray-700 pr-4">
    <nav class="bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden">
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            <li>
                <a href="{{ route('settings.profile.edit') }}" @class([
                    'bg-gray-100 dark:bg-gray-700 block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600' => !request()->routeIs(
                        'settings.profile.*'),
                    'bg-white dark:bg-gray-600 block px-4 py-3  text-gray-900 dark:text-gray-100 font-medium' => request()->routeIs(
                        'settings.profile.*'),
                ])>
                    {{ __('Profile') }}
                </a>
            </li>
            <li>
                <a href="{{ route('settings.password.edit') }}" @class([
                    'bg-gray-100 dark:bg-gray-700 block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600' => !request()->routeIs(
                        'settings.password.*'),
                    'bg-white dark:bg-gray-600  block px-4 py-3 text-gray-900 dark:text-gray-100 font-medium' => request()->routeIs(
                        'settings.password.*'),
                ])>
                    {{ __('Password') }}
                </a>
            </li>
            <li>
                <a href="{{ route('settings.two-factor.edit') }}" @class([
                    'bg-gray-100 dark:bg-gray-700 block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600' => !request()->routeIs('settings.two-factor.*'),
                    'bg-white dark:bg-gray-600 block px-4 py-3  text-gray-900 dark:text-gray-100 font-medium' => request()->routeIs('settings.two-factor.*'),
                ])>
                    {{ __('Two Factor Authentication') }}
                </a>
            </li>
            <li>
                <a href="{{ route('settings.appearance.edit') }}" @class([
                    'bg-gray-100 dark:bg-gray-700 block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600' => !request()->routeIs(
                        'settings.appearance.*'),
                    'bg-white dark:bg-gray-600 block px-4 py-3  text-gray-900 dark:text-gray-100 font-medium' => request()->routeIs(
                        'settings.appearance.*'),
                ])>
                    {{ __('Appearance') }}
                </a>
            </li>
        </ul>
    </nav>
</div>
