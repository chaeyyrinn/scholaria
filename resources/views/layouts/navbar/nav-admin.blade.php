<nav x-data="{ open: false }"
     x-init="$el.classList.add('nav-show')"
     class="bg-[#EEF3FF] py-4 opacity-0 translate-y-[-10px] transition-all duration-500">

    <div class="max-w-7xl mx-auto px-6">

        <!-- NAV CARD -->
        <div class="bg-white rounded-2xl shadow-md px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- LEFT -->
                <div class="flex items-center">
                    <!-- LOGO -->
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-2xl font-bold text-[#3B346D] tracking-wide
                              hover:scale-105 transition duration-300">
                        SCHOLARIA
                    </a>

                    <!-- MENU -->
                    <div class="hidden sm:flex items-center space-x-8 ml-12 text-xs">

                        @php
                            $navItem = '
                            relative transition-all duration-300
                            after:absolute after:left-0 after:-bottom-2
                            after:h-[2px] after:bg-indigo-500
                            after:w-0 hover:after:w-full
                            ';
                        @endphp

                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="{{ $navItem }}">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('admin.data-siswa')" :active="request()->routeIs('admin.data-siswa')" class="{{ $navItem }}">
                            Data Siswa
                        </x-nav-link>

                        <x-nav-link :href="route('admin.data-petugas.index')" :active="request()->routeIs('admin.data-petugas.*')" class="{{ $navItem }}">
                            Data Petugas
                        </x-nav-link>

                        <x-nav-link :href="route('admin.data-buku.index')" :active="request()->routeIs('admin.data-buku.*')" class="{{ $navItem }}">
                            Data Buku
                        </x-nav-link>

                        <x-nav-link :href="route('admin.data-kategori.index')" :active="request()->routeIs('admin.data-kategori.*')" class="{{ $navItem }}">
                            Data Kategori
                        </x-nav-link>

                        <x-nav-link :href="route('admin.validasi.index')" :active="request()->routeIs('admin.validasi.*')" class="{{ $navItem }}">
                            Validasi Buku
                        </x-nav-link>

                        <x-nav-link :href="route('admin.data-riwayat.index')" :active="request()->routeIs('admin.data-riwayat.*')" class="{{ $navItem }}">
                            Riwayat
                        </x-nav-link>

                        <x-nav-link :href="route('admin.data-ulasan.index')" :active="request()->routeIs('admin.data-ulasan.*')" class="{{ $navItem }}">
                            Data Ulasan
                        </x-nav-link>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="hidden sm:flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="w-10 h-10 rounded-full flex items-center justify-center
                                       text-[#3B346D]
                                       hover:bg-[#EEF3FF]
                                       hover:scale-110 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24"
                                     fill="currentColor"
                                     class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                          d="M12 2a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm-7 18a7 7 0 0 1 14 0H5z"
                                          clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div
                                class="px-4 py-2 text-sm text-gray-700
                                       animate-fade-in">
                                {{ Auth::user()->name }}
                            </div>

                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- HAMBURGER -->
                <div class="sm:hidden">
                    <button @click="open = !open"
                            class="p-2 rounded-md text-[#3B346D]
                                   hover:bg-gray-100
                                   hover:rotate-90 transition duration-300">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- MOBILE MENU -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-3"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-3"
             class="sm:hidden mt-3 bg-white rounded-xl shadow px-6 py-4 space-y-2 text-sm">

            @foreach ([
                'Dashboard' => 'admin.dashboard',
                'Data Siswa' => 'admin.data-siswa',
                'Data Petugas' => 'admin.data-petugas.index',
                'Data Buku' => 'admin.data-buku.index',
                'Data Kategori' => 'admin.data-kategori.index',
                'Validasi Buku' => 'admin.validasi.index',
                'Riwayat' => 'admin.data-riwayat.index',
                'Data Ulasan' => 'admin.data-ulasan.index',
            ] as $label => $route)
                <a href="{{ route($route) }}"
                   class="block text-gray-700
                          hover:text-indigo-600
                          hover:translate-x-2
                          transition duration-200">
                    {{ $label }}
                </a>
            @endforeach
        </div>

    </div>

    <!-- ANIMATION STYLE -->
    <style>
        .nav-show {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(4px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in .3s ease-out;
        }
    </style>
</nav>
