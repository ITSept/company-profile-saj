<nav x-data="{ open: false }" class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('storage/images/logo.png') }}"
                     alt="{{ config('app.name', 'PT SAJ') }}"
                     class="h-10 md:h-12 w-auto transition-transform duration-300 hover:scale-105">
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center justify-center gap-8">
                @php
                    $navLinks = [
                        ['name' => 'Home', 'route' => route('home'), 'active' => request()->routeIs('home')],
                        ['name' => 'About', 'route' => route('about'), 'active' => request()->routeIs('about')],
                        // Product akan ditambahkan manual setelah ini
                        ['name' => 'Machine & Technology', 'route' => '#', 'active' => request()->routeIs('machine-technology.index')],
                        ['name' => 'Careers', 'route' => route('job-vacancies.index'), 'active' => request()->routeIs('job-vacancies.index')],
                        ['name' => 'Contact', 'route' => '#', 'active' => request()->routeIs('contact')],
                    ];
                @endphp

                <div class="hidden md:flex items-center justify-center gap-8">
                    {{-- Render Home & About --}}
                    @foreach ($navLinks as $link)
                        @if ($link['name'] === 'Machine & Technology')
                            {{-- Product inserted right after About --}}
                            <div x-data="{ productOpen: false }" @mouseleave="productOpen = false" class="relative">
                                <button @mouseover="productOpen = true"
                                        class="text-base font-semibold text-gray-700 hover:text-orange-600 transition duration-200 flex items-center gap-1">
                                    Product
                                    <svg :class="{ 'rotate-180': productOpen }" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0L5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="productOpen"
                                    x-transition
                                    class="absolute left-0 mt-2 w-56 bg-white border rounded-lg shadow-lg py-2 z-50">
                                    @foreach (['Wecare International', 'Wecare Adult', 'Mamy love', 'Top Adult Diapers', 'Top Adult Pants', 'Top Underpads'] as $product)
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-100">
                                            {{ $product }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <a href="{{ $link['route'] }}"
                        class="text-base font-semibold transition-all duration-200 border-b-2 {{ $link['active'] ? 'text-orange-600 border-orange-600' : 'text-gray-700 border-transparent hover:text-orange-600 hover:border-orange-600' }}">
                            {{ $link['name'] }}
                        </a>
                    @endforeach
                </div>

            </div>

            {{-- Auth & Mobile Menu --}}
            <div class="flex items-center gap-4">
                {{-- Auth Section --}}
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-700 hover:text-orange-600">
                                {{ Auth::user()->name }}
                                <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0L5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('admin.dashboard')">Dashboard</x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                       class="text-white bg-orange-500 hover:bg-orange-600 px-5 py-2 rounded-full font-medium text-sm transition-all duration-300">
                        Log In
                    </a>
                @endauth

                {{-- Hamburger --}}
                <button @click="open = !open"
                        class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-orange-600 hover:bg-orange-100 transition duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
    <div x-show="open" x-transition class="md:hidden bg-white shadow border-t border-gray-100">
        <div class="py-3 px-4 space-y-2">
            @foreach ($navLinks as $link)
                <a href="{{ $link['route'] }}"
                   class="block text-base font-medium {{ $link['active'] ? 'text-orange-600' : 'text-gray-700 hover:text-orange-600' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach

            {{-- Product (mobile dropdown) --}}
            <div x-data="{ openProducts: false }">
                <button @click="openProducts = !openProducts"
                        class="w-full flex justify-between items-center text-base font-medium text-gray-700 hover:text-orange-600">
                    Product
                    <svg :class="{ 'rotate-180': openProducts }" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0L5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="openProducts" class="mt-2 pl-4 space-y-1">
                    @foreach (['Wecare International', 'Wecare Adult', 'Mamy love', 'Top Adult Diapers', 'Top Adult Pants', 'Top Underpads'] as $product)
                        <a href="#" class="block text-sm text-gray-600 hover:text-orange-600">{{ $product }}</a>
                    @endforeach
                </div>
            </div>

            {{-- Auth (mobile) --}}
            @auth
                <hr class="my-2">
                <div class="text-sm text-gray-800">{{ Auth::user()->name }}</div>
                <a href="{{ route('admin.dashboard') }}" class="block text-gray-600 hover:text-orange-600">Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="block text-gray-600 hover:text-orange-600">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                       class="block text-gray-600 hover:text-orange-600">Log Out</a>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="block w-full mt-2 bg-orange-500 text-white text-center py-2 rounded-md hover:bg-orange-600 transition-all duration-300">
                    Log In
                </a>
            @endauth
        </div>
    </div>
</nav>
