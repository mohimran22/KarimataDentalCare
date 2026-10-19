@php
    $role = auth()->check() ? session('user_role') : null;

    // [label, nama route, pola route untuk penanda menu aktif]
    $menus = [
        'dokter' => [
            ['Dashboard', 'dashboard', 'dashboard'],
            ['Pasien', 'pasiens.index', 'pasiens.*'],
            ['Tindakan', 'tindakan.index', 'tindakan.*'],
        ],
        'manager' => [
            ['Dashboard', 'dashboard', 'dashboard'],
            ['Dokter', 'dokters.index', 'dokters.*'],
            ['Role', 'roles.index', 'roles.*'],
            ['Tindakan', 'tindakan.index', 'tindakan.*'],
            ['Obat', 'obats.index', 'obats.*'],
            ['Pasien', 'pasiens.index', 'pasiens.*'],
            ['Kasir', 'kasir.index', 'kasir.*'],
            ['Keuangan', 'laporan-keuangan', 'laporan-keuangan*'],
        ],
        'admin' => [
            ['Obat', 'obats.index', 'obats.*'],
            ['Pasien', 'pasiens.index', 'pasiens.*'],
            ['Kasir', 'kasir.index', 'kasir.*'],
        ],
    ];

    $items = $menus[$role] ?? [];
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-40">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden sm:flex space-x-8 sm:-my-px sm:ms-10">
                    @foreach ($items as [$label, $routeName, $pattern])
                        <x-nav-link :href="route($routeName)" :active="request()->routeIs($pattern)">
                            {{ __($label) }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <!-- Settings Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out"
                    aria-label="Menu">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div x-show="open" x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="sm:hidden border-t border-gray-100 bg-white shadow-lg">

        <!-- Menu -->
        <div class="px-3 py-3 space-y-1">
            @foreach ($items as [$label, $routeName, $pattern])
                @php $active = request()->routeIs($pattern); @endphp
                <a href="{{ route($routeName) }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition
                        {{ $active
                            ? 'bg-gray-100 text-primary-700 border-s-4 border-primary-700'
                            : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 border-s-4 border-transparent' }}">
                    {{ __($label) }}
                </a>
            @endforeach
        </div>

        <!-- Akun -->
        <div class="border-t border-gray-100 px-3 py-4">
            <div class="flex items-center gap-3 px-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-primary-700 text-white flex items-center justify-center font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <div class="text-sm font-medium text-gray-800 truncate">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-start flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 transition">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>