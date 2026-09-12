<nav
    x-data="{
        expanded: true,
        mobileOpen: false,
        settingsOpen: false
    }"
    class="bg-white border-r border-gray-200 fixed top-0 left-0 h-full transition-all duration-300 z-50 shadow-lg w-64"
>
    <!-- Logo -->
    <div class="flex items-center justify-center h-24 border-b border-gray-200 bg-white">
        <a href="{{ route('dashboard') }}" class="flex items-center border-b-4 transition-all duration-300">
            <img src="{{ asset('images/awdlogo.png') }}"
                alt="Logo"
                class="transition-all duration-300 object-contain w-36">
        </a>

        <!-- Mobile toggle button -->
        <button
            class="sm:hidden absolute right-2 top-5 text-gray-600 hover:text-gray-900"
            @click="mobileOpen = !mobileOpen">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

@php
    $navItems = [
        // Dashboard: Grid icon
        ['route' => 'dashboard', 'label' => __('Dashboard'), 'icon' => '<i class="fas fa-th-large"></i>'],

        // News: Newspaper icon
        ['route' => 'news.index', 'label' => __('News'), 'icon' => '<i class="fas fa-newspaper"></i>'],

        // Careers: User group icon
        ['route' => 'careerss.index', 'label' => __('Careers'), 'icon' => '<i class="fas fa-users"></i>'],

        // Services: Tools icon
        ['route' => 'services.index', 'label' => __('Services'), 'icon' => '<i class="fas fa-tools"></i>'],

        // Projects: Folder icon
        ['route' => 'projects.index', 'label' => __('Projects'), 'icon' => '<i class="fas fa-folder-open"></i>'],

        // Clients: Users icon
        ['route' => 'clients.index', 'label' => __('Clients'), 'icon' => '<i class="fas fa-user-friends"></i>'],

        // Statistics: Chart icon
        ['route' => 'totals.index', 'label' => __('Statistics'), 'icon' => '<i class="fas fa-chart-bar"></i>'],

        // Applied Jobs: Briefcase icon
        ['route' => 'job.applications.index', 'label' => __('Applyed Jobs'), 'icon' => '<i class="fas fa-briefcase"></i>'],

        ['route' => 'ceo.index', 'label' => __('Ceo Informations'), 'icon' => '<i class="fa-regular fa-user"></i>'],

    ];
@endphp

    <!-- Sidebar Links -->
    <ul class="mt-6 space-y-1.5 px-3 hidden sm:block">
        @foreach($navItems as $item)
            <li>
                <a
                    href="{{ route($item['route']) }}"
                    class="group flex items-center space-x-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-[#e9bc64]/10 transition-all relative"
                    :class="{
                        'bg-[#e9bc64]/20 text-[#e9bc64] font-medium border-r-2 border-[#e9bc64]': '{{ request()->route()->getName() }}' === '{{ $item['route'] }}'
                    }"
                >
                    <!-- Active indicator -->
                    <div x-show="'{{ request()->route()->getName() }}' === '{{ $item['route'] }}'"
                         class="absolute -left-3 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-[#e9bc64] rounded-full"></div>

                    <!-- Icon -->
                    <span class="flex-shrink-0 text-lg"
                          :class="{
                              'text-[#e9bc64]': '{{ request()->route()->getName() }}' === '{{ $item['route'] }}',
                              'text-gray-500 group-hover:text-[#e9bc64]': '{{ request()->route()->getName() }}' !== '{{ $item['route'] }}'
                          }">
                        {!! $item['icon'] !!}
                    </span>

                    <!-- Label - Always visible -->
                    <span class="whitespace-nowrap font-medium">
                        {{ $item['label'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Divider -->
    <div class="my-4 px-3 hidden sm:block">
        <div class="border-t border-gray-200"></div>
    </div>

    <!-- User Section -->
    <div class="absolute bottom-0 w-full p-3 border-t border-gray-200 bg-white hidden sm:block">
        <div class="flex items-center space-x-3 mb-3">
            <div class="h-10 w-10 rounded-full bg-[#e9bc64] flex items-center justify-center text-white font-semibold text-sm">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="min-w-0">
                <div class="text-gray-800 font-semibold truncate">{{ Auth::user()->name }}</div>
                <div class="text-gray-500 text-xs truncate">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <button
            @click="settingsOpen = !settingsOpen"
            @click.away="settingsOpen = false"
            class="group flex items-center w-full text-left px-3 py-2.5 rounded-lg text-gray-600 hover:bg-[#e9bc64]/10 relative"
        >
            <span class="text-lg text-gray-500 group-hover:text-[#e9bc64]">
                <i class="fas fa-cog"></i>
            </span>
            <span class="ms-3 font-medium">Settings</span>
        </button>

        <div x-show="settingsOpen" class="absolute bottom-16 left-3 w-48 py-1 bg-white rounded-lg shadow-lg border border-gray-200 z-10"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="settingsOpen = false"
        >
            <a href="{{ route('profile.edit') }}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-[#e9bc64] hover:bg-[#e9bc64]/10">
                <i class="fas fa-user mr-2"></i>
                {{ __('Profile') }}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg">
                    <i class="fas fa-sign-out-alt mr-2"></i>
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
        class="sm:hidden fixed top-0 left-0 bg-white h-full w-64 p-5 border-r border-gray-200 shadow-2xl z-50 overflow-y-auto"
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
            <button @click="mobileOpen = false" class="text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Links -->
        <div class="space-y-2">
            @foreach($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-[#e9bc64]/10 relative"
                    :class="{
                        'bg-[#e9bc64]/20 text-[#e9bc64] font-medium border-r-2 border-[#e9bc64]': '{{ request()->route()->getName() }}' === '{{ $item['route'] }}'
                    }"
                >
                    <div x-show="'{{ request()->route()->getName() }}' === '{{ $item['route'] }}'"
                         class="absolute -left-3 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-[#e9bc64] rounded-full"></div>

                    <span class="text-lg">{!! $item['icon'] !!}</span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach

            <hr class="my-4 border-gray-300">

            <!-- Mobile User Info -->
            <div class="px-2 py-3 bg-gray-50 rounded-lg">
                <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-[#e9bc64]/10">
                <i class="fas fa-user"></i>
                <span>{{ __('Profile') }}</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center space-x-3 px-3 py-2.5 rounded-lg text-red-600 hover:bg-red-50">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{ __('Log Out') }}</span>
                </button>
            </form>
        </div>
    </div>
</nav>
