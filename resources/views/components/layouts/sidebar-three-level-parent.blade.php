@props(['active' => false, 'title' => '', 'icon' => 'fas-list'])

<div x-data="{ subOpen: {{ $active ? 'true' : 'false' }} }">
    <button @click="
        if (sidebarOpen) {
            subOpen = !subOpen;
        } else {
            temporarilyOpenSidebar();
            subOpen = true;
        }
    " @class([
        'flex items-center justify-between w-full px-3 py-2 text-sm rounded-md hover:bg-sidebar-accent hover:text-sidebar-accent-foreground',
        'bg-sidebar-accent text-sidebar-accent-foreground font-medium' => $active,
        'hover:bg-sidebar-accent hover:text-sidebar-accent-foreground text-sidebar-foreground' => !$active,
    ])>
        <div class="flex items-center">
            @svg($icon, $active ? 'w-5 h-5 text-white' : 'w-5 h-5 text-gray-500')
            <span :class="{ 'opacity-0 hidden ml-0': !sidebarOpen, 'ml-3': sidebarOpen }"
                class="transition-opacity duration-300">{{ $title }}</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" 
            :class="{ 'rotate-90': subOpen, 'opacity-0': !sidebarOpen }"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
    
    <!-- Submenu when sidebar is open -->
    <div x-show="subOpen && sidebarOpen" class="mt-1 ml-4 space-y-1">
        {{ $slot }}
    </div>
</div>
