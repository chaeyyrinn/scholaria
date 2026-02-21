<nav x-data="{ open: false }" class="bg-[#EEF3FF] py-4 animate-fade-down">
    <div class="max-w-7xl mx-auto px-6">

        <!-- NAV CARD -->
        <div class="bg-white rounded-2xl shadow-md px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- LEFT -->
                <div class="flex items-center">
                    <!-- LOGO -->
                    <a href="{{ route('petugas.dashboard') }}"
                       class="text-2xl font-bold text-[#3B346D] tracking-wide">
                        SCHOLARIA
                    </a>

                    <!-- MENU -->
                    <div class="hidden sm:flex items-center space-x-8 ml-12 text-xs">

                        <x-nav-link :href="route('petugas.dashboard')" :active="request()->routeIs('petugas.dashboard')" class="nav-item">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('petugas.data-siswa')" :active="request()->routeIs('petugas.data-siswa')" class="nav-item">
                            Data Siswa
                        </x-nav-link>

                        <x-nav-link :href="route('petugas.data-kategori.index')" :active="request()->routeIs('petugas.data-kategori.index')" class="nav-item">
                            Data Kategori
                        </x-nav-link>

                        <x-nav-link :href="route('petugas.data-buku.index')" :active="request()->routeIs('petugas.data-buku.index')" class="nav-item">
                            Data Buku
                        </x-nav-link>

                        <x-nav-link :href="route('petugas.validasi.index')" :active="request()->routeIs('petugas.validasi.index')" class="nav-item">
                            Validasi Peminjaman
                        </x-nav-link>

                        <x-nav-link :href="route('petugas.data-peminjaman.index')" :active="request()->routeIs('petugas.data-peminjaman.index')" class="nav-item">
                            Data Peminjaman
                        </x-nav-link>

                        <x-nav-link :href="route('petugas.riwayat-peminjaman.index')" :active="request()->routeIs('petugas.riwayat-peminjaman.index')" class="nav-item">
                            Riwayat Peminjaman
                        </x-nav-link>

                    </div>
                </div>

                <!-- RIGHT : PROFILE DROPDOWN -->
                <div class="hidden sm:flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="w-10 h-10 rounded-full text-[#3B346D]
                                       flex items-center justify-center
                                       hover:bg-[#EEF3FF] transition">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24" height="24"
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
                                {{ Auth::user()->nama }}
                            </div>

                            <x-dropdown-link :href="route('petugas.profil.index')">
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
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- MOBILE MENU -->
        <div x-show="open" x-transition
             class="sm:hidden mt-3 bg-white rounded-xl shadow px-6 py-4 space-y-2 text-sm">
            <a href="{{ route('petugas.dashboard') }}" class="mobile-item">Dashboard</a>
            <a href="{{ route('petugas.data-kategori.index') }}" class="mobile-item">Data Kategori</a>
            <a href="{{ route('petugas.data-buku.index') }}" class="mobile-item">Data Buku</a>
            <a href="{{ route('petugas.validasi.index') }}" class="mobile-item">Validasi Peminjaman</a>
            <a href="{{ route('petugas.data-peminjaman.index') }}" class="mobile-item">Data Peminjaman</a>
            <a href="{{ route('petugas.riwayat-peminjaman.index') }}" class="mobile-item">Riwayat Peminjaman</a>
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

        .nav-item:hover::after {
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