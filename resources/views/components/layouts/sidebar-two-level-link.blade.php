@props(['active' => false, 'href' => '#', 'icon' => 'fas-house'])

<a href="{{ $href }}" @class([
    'flex items-center px-3 py-2 text-sm rounded-md transition-colors duration-200',
    'bg-sidebar-accent text-sidebar-accent-foreground font-medium' => $active,
    'hover:bg-sidebar-accent hover:text-sidebar-accent-foreground text-sidebar-foreground' => !$active,
])
:class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
    @svg($icon, $active ? 'w-5 h-5 text-white dark:text-gray-800' : 'w-5 h-5 text-gray-500')
    <span x-show="sidebarOpen" x-transition:enter="transition-all duration-300" x-transition:enter-start="opacity-0 transform -translate-x-2"
        x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition-all duration-300"
        x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform -translate-x-2"
        class="ml-3 whitespace-nowrap">{{ $slot }}</span>
</a>
