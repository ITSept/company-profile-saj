<nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="{{ config('app.name', 'PT SAJ') }}" class="h-8 w-auto">
                    <span class="text-xl font-bold text-indigo-600 hover:text-indigo-700 transition-all">{{ config('app.name', 'PT SAJ') }}</span>
                </a>
            </div>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center space-x-6">
                @php
                    $menus = [
                        ['name' => 'Beranda', 'route' => 'home'],
                        ['name' => 'Produk', 'route' => 'products.index'],
                        ['name' => 'Karir', 'route' => 'job-vacancies.index'],
                        // ['name' => 'Tentang Kami', 'route' => '#'],
                        // ['name' => 'Kontak', 'route' => '#'],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) ?? $menu['route'] }}"
                       class="text-gray-600 hover:text-indigo-600 font-medium transition duration-200">
                        {{ $menu['name'] }}
                    </a>
                @endforeach
            </div>

            {{-- Authentication & Mobile Toggle --}}
            <div class="flex items-center space-x-3">
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-sm font-semibold text-gray-700 hover:text-indigo-700 transition duration-200">
                       Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-semibold text-gray-600 hover:text-indigo-600 transition duration-200">
                       Login
                    </a>
                @endauth

                {{-- Mobile Toggle --}}
                <button @click="open = !open" class="md:hidden p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition class="md:hidden bg-white shadow-sm border-t border-gray-100">
        <div class="px-4 py-4 space-y-2">
            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) ?? $menu['route'] }}"
                   class="block text-gray-700 font-medium hover:text-indigo-600 transition">
                   {{ $menu['name'] }}
                </a>
            @endforeach

            @auth
                <a href="{{ route('admin.dashboard') }}"
                   class="block text-gray-700 font-medium hover:text-indigo-600 transition">
                   Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="block text-gray-700 font-medium hover:text-indigo-600 transition">
                   Login
                </a>
            @endauth
        </div>
    </div>
</nav>
