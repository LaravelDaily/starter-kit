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
        'flex items-center w-full px-3 py-2 text-sm rounded-md hover:bg-sidebar-accent hover:text-sidebar-accent-foreground transition-colors duration-200',
        'bg-sidebar-accent text-sidebar-accent-foreground font-medium' => $active,
        'hover:bg-sidebar-accent hover:text-sidebar-accent-foreground text-sidebar-foreground' => !$active,
    ])
    :class="{ 'justify-center': !sidebarOpen, 'justify-between': sidebarOpen }">
        <div class="flex items-center" :class="{ 'justify-center': !sidebarOpen }">
            @svg($icon, $active ? 'w-5 h-5 text-white dark:text-gray-800' : 'w-5 h-5 text-gray-500')
            <span x-show="sidebarOpen" x-transition:enter="transition-all duration-300" x-transition:enter-start="opacity-0 transform -translate-x-2"
                x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition-all duration-300"
                x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform -translate-x-2"
                class="ml-3 whitespace-nowrap">{{ $title }}</span>
        </div>
        <svg x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform"
            :class="{ 'rotate-90': subOpen }"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Submenu when sidebar is open -->
    <div x-show="subOpen && sidebarOpen" class="mt-1 ml-4 space-y-1">
        {{ $slot }}
    </div>
</div>
