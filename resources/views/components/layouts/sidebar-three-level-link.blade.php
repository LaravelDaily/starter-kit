@props(['active' => false, 'href' => '#'])

<a href="{{ $href }}" @class([
    'flex items-center px-3 py-2 text-sm rounded-md transition-colors duration-200',
    'bg-sidebar-accent text-sidebar-accent-foreground font-medium' => $active,
    'hover:bg-sidebar-accent hover:text-sidebar-accent-foreground text-sidebar-foreground' => !$active,
])>
    <span x-data="{}" :class="{ 'opacity-0 hidden': !sidebarOpen }">{{ $slot }}</span>
</a>
