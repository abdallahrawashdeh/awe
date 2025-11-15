<nav
    x-data="{
        expanded: false,
        mobileOpen: false,
        settingsOpen: false
    }"
    class="bg-gradient-to-b from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 border-r border-gray-200 dark:border-gray-700 fixed top-0 left-0 h-full transition-all duration-300 z-50 shadow-lg"
    :class="expanded ? 'w-64' : 'w-20'"
    @mouseenter="expanded = true"
    @mouseleave="expanded = false"
>
    <!-- Logo -->
<div class="flex items-center justify-center h-16 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
    <a href="{{ route('dashboard') }}"
       class="flex items-center border-b-4 transition-all duration-300
        ">

        <img src="{{ asset('images/newlogo.png') }}"
            alt="Logo"
            class="transition-all duration-300 object-contain"
            :class="expanded ? 'w-36' : 'w-10'">
    </a>

    <!-- Mobile toggle button -->
    <button
        class="sm:hidden absolute right-2 top-5 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"
        @click="mobileOpen = !mobileOpen">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>

    <!-- Sidebar Links -->
    <ul class="mt-6 space-y-1.5 px-3 hidden sm:block">
        @php
            $navItems = [
                ['route' => 'dashboard',       'label' => __('Dashboard'),   'icon' => '📊'],
                ['route' => 'news.index',      'label' => __('News'),        'icon' => '📰'],
                ['route' => 'careerss.index',  'label' => __('Careers'),     'icon' => '💼'],
                ['route' => 'services.index',  'label' => __('Services'),    'icon' => '⚙️'],
                ['route' => 'projects.index',  'label' => __('Projects'),    'icon' => '📁'],
                ['route' => 'clients.index',   'label' => __('Clients'),     'icon' => '👥'],
            ];
        @endphp

        @foreach($navItems as $item)
            <li>
                <a
                    href="{{ route($item['route']) }}"
                    class="group flex items-center space-x-3 px-3 py-2.5 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all relative"
                    :class="{
                        'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 font-medium border-r-2 border-blue-500': '{{ request()->route()->getName() }}' === '{{ $item['route'] }}'
                    }"
                >
                    <!-- Active indicator -->
                    <div x-show="'{{ request()->route()->getName() }}' === '{{ $item['route'] }}'"
                         class="absolute -left-3 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-blue-500 rounded-full"></div>

                    <!-- Icon -->
                    <span class="flex-shrink-0 text-lg"
                          :class="{
                              'text-blue-600 dark:text-blue-300': '{{ request()->route()->getName() }}' === '{{ $item['route'] }}',
                              'text-gray-500 dark:text-gray-400 group-hover:text-blue-500 dark:group-hover:text-blue-400': '{{ request()->route()->getName() }}' !== '{{ $item['route'] }}'
                          }">
                        {{ $item['icon'] }}
                    </span>

                    <!-- Label -->
                    <span x-show="expanded"
                          x-transition:enter="transition-opacity duration-200"
                          x-transition:enter-start="opacity-0"
                          x-transition:enter-end="opacity-100"
                          class="whitespace-nowrap font-medium">
                        {{ $item['label'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Divider -->
    <div class="my-4 px-3 hidden sm:block"
         x-show="expanded"
         x-transition:enter="transition-opacity duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100">
        <div class="border-t border-gray-200 dark:border-gray-700"></div>
    </div>

    <!-- User Section -->
    <div class="absolute bottom-0 w-full p-3 border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-800 hidden sm:block">

        <!-- User Info -->
        <div x-show="expanded"
             x-transition:enter="transition-all duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             class="flex items-center space-x-3 mb-3">
            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-white font-semibold text-sm">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="min-w-0">
                <div class="text-gray-800 dark:text-gray-200 font-semibold truncate">{{ Auth::user()->name }}</div>
                <div class="text-gray-500 dark:text-gray-400 text-xs truncate">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <!-- Settings Button -->
        <button
            @click="settingsOpen = !settingsOpen"
            @click.away="settingsOpen = false"
            class="group flex items-center w-full text-left px-3 py-2.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors relative"
            :class="{
                'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 font-medium border-r-2 border-blue-500': '{{ request()->route()->getName() }}' === 'profile.edit'
            }"
        >
            <!-- Active indicator for settings -->
            <div x-show="'{{ request()->route()->getName() }}' === 'profile.edit'"
                 class="absolute -left-3 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-blue-500 rounded-full"></div>

            <span class="text-lg text-gray-500 dark:text-gray-400 group-hover:text-blue-500 dark:group-hover:text-blue-400">
                ⚙️
            </span>
            <span x-show="expanded"
                  x-transition:enter="transition-opacity duration-200"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  class="ms-3 font-medium">{{ __('Settings') }}</span>
        </button>

        <!-- Dropdown Menu -->
        <div
            x-show="settingsOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute bottom-16 left-3 w-48 py-1 bg-white dark:bg-gray-700 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 z-10"
            @click.away="settingsOpen = false"
        >
            <a
                href="{{ route('profile.edit') }}"
                class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600"
                :class="{
                    'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300': '{{ request()->route()->getName() }}' === 'profile.edit'
                }"
            >
                <span class="text-base mr-2">👤</span>
                {{ __('Profile') }}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full text-left flex items-center px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20"
                >
                    <span class="text-base mr-2">🚪</span>
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>

    <!-- MOBILE MENU BACKDROP -->
    <div
        class="sm:hidden fixed inset-0 bg-black bg-opacity-40 z-40"
        x-show="mobileOpen"
        x-transition:enter="transition-opacity duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.away="mobileOpen = false"
    ></div>

    <!-- MOBILE MENU -->
    <div
        class="sm:hidden fixed top-0 left-0 bg-gradient-to-b from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 h-full w-64 p-5 border-r border-gray-200 dark:border-gray-700 shadow-2xl z-50 overflow-y-auto"
        x-show="mobileOpen"
        x-transition:enter="transition-transform duration-300 ease-out"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition-transform duration-200 ease-in"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
    >
        <!-- Close button -->
        <div class="flex justify-end mb-4">
            <button @click="mobileOpen = false" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Links -->
        <div class="space-y-2">
            @php
                $navItems = [
                    ['route' => 'dashboard',       'label' => __('Dashboard'),   'icon' => '📊'],
                    ['route' => 'news.index',      'label' => __('News'),        'icon' => '📰'],
                    ['route' => 'careerss.index',  'label' => __('Careers'),     'icon' => '💼'],
                    ['route' => 'services.index',  'label' => __('Services'),    'icon' => '⚙️'],
                    ['route' => 'projects.index',  'label' => __('Projects'),    'icon' => '📁'],
                    ['route' => 'clients.index',   'label' => __('Clients'),     'icon' => '👥'],
                ];
            @endphp

            @foreach($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 relative"
                    :class="{
                        'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 font-medium border-r-2 border-blue-500': '{{ request()->route()->getName() }}' === '{{ $item['route'] }}'
                    }"
                >
                    <!-- Active indicator for mobile -->
                    <div x-show="'{{ request()->route()->getName() }}' === '{{ $item['route'] }}'"
                         class="absolute -left-3 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-blue-500 rounded-full"></div>

                    <span class="text-lg text-gray-500 dark:text-gray-400">
                        {{ $item['icon'] }}
                    </span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach

            <hr class="my-4 border-gray-300 dark:border-gray-600">

            <!-- User Info (Mobile) -->
            <div class="px-2 py-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                <div class="font-semibold text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <!-- Mobile Settings & Logout -->
            <a
                href="{{ route('profile.edit') }}"
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 relative"
                :class="{
                    'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 font-medium border-r-2 border-blue-500': '{{ request()->route()->getName() }}' === 'profile.edit'
                }"
            >
                <!-- Active indicator for profile -->
                <div x-show="'{{ request()->route()->getName() }}' === 'profile.edit'"
                     class="absolute -left-3 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-blue-500 rounded-full"></div>

                <span class="text-lg">👤</span>
                <span>{{ __('Profile') }}</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="flex w-full items-center space-x-3 px-3 py-2.5 rounded-lg text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 text-left"
                >
                    <span class="text-lg">🚪</span>
                    <span>{{ __('Log Out') }}</span>
                </button>
            </form>
        </div>
    </div>
</nav>
