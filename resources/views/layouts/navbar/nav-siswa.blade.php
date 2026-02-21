<nav x-data="{ open: false }" class="bg-[#EEF3FF] py-4 animate-fade-down">
    <div class="max-w-7xl mx-auto px-6">

        <!-- NAV CARD -->
        <div class="bg-white rounded-2xl shadow-md px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- LEFT -->
                <div class="flex items-center">
                    <!-- LOGO -->
                    <a href="{{ route('siswa.dashboard') }}"
                       class="text-2xl font-bold text-[#3B346D] tracking-wide">
                        SCHOLARIA
                    </a>

                    <!-- MENU -->
                    <div class="hidden sm:flex items-center space-x-8 ml-12 text-xs">

                        <x-nav-link :href="route('siswa.dashboard')"
                                    :active="request()->routeIs('siswa.dashboard')"
                                    class="nav-item">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('siswa.buku-saya.index')"
                                    :active="request()->routeIs('siswa.buku-saya.*')"
                                    class="nav-item">
                            Buku Saya
                        </x-nav-link>

                        <x-nav-link :href="route('siswa.katalog.index')"
                                    :active="request()->routeIs('siswa.katalog.*')"
                                    class="nav-item">
                            Katalog Buku
                        </x-nav-link>

                        <x-nav-link :href="route('siswa.riwayat.index')"
                                    :active="request()->routeIs('siswa.riwayat.*')"
                                    class="nav-item">
                            Riwayat Peminjaman
                        </x-nav-link>

                    </div>
                </div>

                <!-- RIGHT : PROFILE -->
                <div class="hidden sm:flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="w-10 h-10 rounded-full text-[#3B346D]
                                       flex items-center justify-center
                                       hover:bg-[#EEF3FF] transition">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="22" height="22"
                                     fill="currentColor"
                                     viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd"
                                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8
                                             m8-7a7 7 0 0 0-5.468 11.37
                                             C3.242 11.226 4.805 10 8 10
                                             s4.757 1.225 5.468 2.37
                                             A7 7 0 0 0 8 1"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 text-sm text-gray-700">
                                {{ Auth::user()->name }}
                            </div>

                            <x-dropdown-link :href="route('siswa.profil.index')">
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
                            class="p-2 rounded-md text-[#3B346D] hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- MOBILE MENU -->
        <div x-show="open" x-transition
             class="sm:hidden mt-3 bg-white rounded-xl shadow px-6 py-4 space-y-2 text-sm">

            <a href="{{ route('siswa.dashboard') }}" class="mobile-item">Dashboard</a>
            <a href="{{ route('siswa.buku-saya.index') }}" class="mobile-item">Buku Saya</a>
            <a href="{{ route('siswa.katalog.index') }}" class="mobile-item">Katalog Buku</a>
            <a href="{{ route('siswa.riwayat.index') }}" class="mobile-item">Riwayat Peminjaman</a>

            <hr class="my-2">

            <a href="{{ route('siswa.profil.index') }}" class="mobile-item">Profile</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="mobile-item text-left w-full">
                    Log Out
                </button>
            </form>
        </div>

    </div>

    <!-- STYLE NYATU -->
    <style>
        .nav-item {
            position: relative;
            transition: color .25s ease;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0;
            height: 2px;
            background: #6366f1;
            border-radius: 999px;
            transition: width .25s ease;
        }

        .nav-item:hover::after,
        .nav-item[aria-current="page"]::after {
            width: 100%;
        }

        .mobile-item {
            display: block;
            padding: .4rem 0;
            color: #374151;
            transition: .2s;
        }

        .mobile-item:hover {
            color: #4f46e5;
            padding-left: 6px;
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-down {
            animation: fadeDown .4s ease-out;
        }
    </style>
</nav>
