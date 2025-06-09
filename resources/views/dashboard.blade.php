<x-layouts.app>

    <div class="mb-2">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Dashboard')}}</h1>
        
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mb-2">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold text-black dark:text-white">{{ __('Total Users') }}</p>
                    <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">24001</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold text-black dark:text-white">{{ __('Total Revenue') }}</p>
                    <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">R 102 500 000</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                </div>
                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 dark:text-green-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold text-black dark:text-white">{{ __('Total Orders') }}</p>
                    <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">107</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                </div>
                <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 dark:text-purple-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Visitors Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold text-black dark:text-white">{{ __('Total Visitors') }}</p>
                    <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">474</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                </div>
                <div class="bg-orange-100 dark:bg-orange-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 dark:text-orange-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>


<body class="bg-gradient-to-br from-[#2A2A72] to-[#009FFD] text-white font-sans">
    <!-- Main Content -->
    <main class="flex-1 p-0 space-y-0">
   
      <!-- Dashboard Cards -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
        <!-- Revenue Graph -->
    <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
  <div class="flex justify-between items-center mb-4">
    <div>
      <p class="text-lg font-semibold text-black dark:text-white">Total Revenue</p>
      <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">R 102.5M</p>
    </div>
    <div class="text-sm text-gray-500 dark:text-gray-400">Last 6 months</div>
  </div>

  <!-- Enhanced SVG Line Graph -->
  <div class="h-40 w-full relative">
    <svg viewBox="0 0 100 40" class="absolute top-0 left-0 w-full h-full text-gray-300 dark:text-gray-600">
      <!-- Horizontal grid lines -->
      <line x1="0" y1="5" x2="100" y2="5" stroke="currentColor" stroke-width="0.3"/>
      <line x1="0" y1="15" x2="100" y2="15" stroke="currentColor" stroke-width="0.3"/>
      <line x1="0" y1="25" x2="100" y2="25" stroke="currentColor" stroke-width="0.3"/>
      <line x1="0" y1="35" x2="100" y2="35" stroke="currentColor" stroke-width="0.3"/>
      
      <!-- Vertical grid lines -->
      <line x1="20" y1="0" x2="20" y2="40" stroke="currentColor" stroke-width="0.3"/>
      <line x1="40" y1="0" x2="40" y2="40" stroke="currentColor" stroke-width="0.3"/>
      <line x1="60" y1="0" x2="60" y2="40" stroke="currentColor" stroke-width="0.3"/>
      <line x1="80" y1="0" x2="80" y2="40" stroke="currentColor" stroke-width="0.3"/>

      <!-- Line path -->
      <polyline 
        fill="none" 
        stroke="#4A4AE3" 
        stroke-width="1" 
        points="0,35 20,30 40,25 60,15 80,10 100,5" />
      
      <!-- Highlight last point -->
      <circle cx="100" cy="5" r="1.8" fill="#4A4AE3" />
    </svg>

    <!-- Y-axis labels -->
    <div class="absolute left-0 top-0 h-full flex flex-col justify-between text-xs text-gray-500 dark:text-gray-400 pl-1">
      <span>R 100M</span>
      <span>R 75M</span>
      <span>R 50M</span>
      <span>R 25M</span>
      <span>R 0</span>
    </div>
  </div>
</div>


        <!-- Vendors Onboarded -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
          <p class="text-lg font-semibold mb-4">Vendors Onboarded</p>
          <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">300</p>
          <p class="text-sm mt-2">Jun 2025</p>
        </div>

<!-- Product Sold -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-lg font-semibold text-black dark:text-white">{{ __('Product Sold') }}</p>
            <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">3452</p>
            <p class="text-xs text-gray-500 flex items-center mt-1">
                <!-- Trending Up Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12l5 5L20 7" />
                </svg>
                {{ __('+12% from last month') }}
            </p>
        </div>
        <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
            <!-- Shopping Cart Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-300"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7H19m-12 0a1 1 0 100 2 1 1 0 000-2zm10 0a1 1 0 100 2 1 1 0 000-2z" />
            </svg>
        </div>
    </div>
</div>

<!-- Profits Earned -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-lg font-semibold text-black dark:text-white">{{ __('Profits Earned') }}</p>
            <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">R 24001</p>
            <p class="text-xs text-gray-500 flex items-center mt-1">
                <!-- Chart Line Up Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 11V3m0 0L6 8m5-5l5 5M5 13l4 4L19 7" />
                </svg>
                {{ __('+18% growth') }}
            </p>
        </div>
        <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
            <!-- Currency Dollar Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-300"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3m0-6v12m0-12c1.657 0 3 1.343 3 3s-1.343 3-3 3" />
            </svg>
        </div>
    </div>
</div>


            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold text-black dark:text-white">{{ __('12') }}</p>
                    <p class="text-2xl font-bold text-green-400 dark:text-green-400 mt-1">7 Jun, 2025</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            
                        </svg>
                        {{ __('') }}
                    </p>
                </div>
                <div class="">
                     <button class="mt-4 bg-[#4A4AE3] px-4 py-2 rounded text-white">Send RSVP</button>
                </div>
            </div>
        </div>

      </div>
    </main>
  </div>
</body>
</html>


</x-layouts.app>
