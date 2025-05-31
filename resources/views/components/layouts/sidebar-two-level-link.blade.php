@props(['active' => false, 'href' => '#', 'icon' => 'fas-house'])

<a href="{{ $href }}" @class([
    'flex items-center px-3 py-2 text-sm rounded-md transition-colors duration-200',
    'bg-sidebar-accent text-sidebar-accent-foreground font-medium' => $active,
    'hover:bg-sidebar-accent hover:text-sidebar-accent-foreground text-sidebar-foreground' => !$active,
])>
    <div class="flex items-center">
        @svg($icon, $active ? 'w-5 h-5 mr-3 text-white' : 'w-5 h-5 mr-3 text-gray-500')
        <span x-data="{}" :class="{ 'opacity-0 hidden': !sidebarOpen }">{{ $slot }}</span>
    </div>
</a>
