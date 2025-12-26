<!-- ===== Sidebar Start ===== -->
<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
<div class="flex items-center justify-center pt-8 pb-7 sidebar-header">
    <a href="index.html" class="flex items-center justify-center gap-3 w-full">

        <!-- Logo lengkap saat sidebar terbuka -->
        <div
            class="flex items-center gap-3 transition-all duration-300"
            :class="sidebarToggle ? 'hidden' : 'flex'">

            <!-- Icon celengan yang lebih modern -->
            <svg
                width="42"
                height="42"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="shrink-0 drop-shadow-lg">
                <defs>
                    <linearGradient id="pigGradient" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#3B82F6" />
                        <stop offset="100%" stop-color="#6366F1" />
                    </linearGradient>
                </defs>
                
                <!-- Body utama dengan efek 3D ringan -->
                <path
                    d="M19 10.5C19 14.6421 15.6421 18 11.5 18H6C4.34315 18 3 16.6569 3 15V10C3 6.13401 6.13401 3 10 3C14.1421 3 17.5 6.35786 17.5 10.5V11H19C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H17.5V10.5Z"
                    fill="url(#pigGradient)"
                    stroke="url(#pigGradient)"
                    stroke-width="0.5"/>
                
                <!-- Mata dengan highlight -->
                <circle cx="9" cy="11" r="1" fill="#0F172A" />
                <circle cx="9" cy="10.5" r="0.3" fill="#ffffff" />
                
                <!-- Lubang hidung -->
                <circle cx="14" cy="12.5" r="0.4" fill="#1E3A8A" opacity="0.8"/>
                
                <!-- Ekor dengan sedikit lengkungan -->
                <path d="M6 17C6 17 7 16.5 7 18C7 19.5 6 19 6 19" stroke="#1E3A8A" stroke-width="1.2" stroke-linecap="round" fill="none"/>
                
                <!-- Telinga -->
                <path d="M13.5 8C13.5 8 14.5 7 15.5 8.5" stroke="#3B82F6" stroke-width="1" stroke-linecap="round" fill="none"/>
                
                <!-- Highlight pada badan -->
                <ellipse cx="12.5" cy="10" rx="1.5" ry="0.8" fill="#ffffff" opacity="0.2"/>
            </svg>

            <!-- Text Logo dengan typography yang lebih baik -->
            <span
                class="text-3xl font-bold tracking-tight
                       bg-gradient-to-r from-blue-500 via-sky-500 to-indigo-600
                       bg-clip-text text-transparent
                       drop-shadow-sm">
                Tabsis
            </span>
        </div>

        <!-- Logo singkat saat sidebar tertutup -->
        <div
            class="transition-all duration-300"
            :class="sidebarToggle ? 'flex' : 'hidden'">

            <!-- Monogram yang lebih stylish -->
            <div class="relative">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md">
                    <span class="text-lg font-bold text-white tracking-tighter">
                        TS
                    </span>
                </div>
                <!-- Efek highlight kecil -->
                <div class="absolute top-1 right-1 w-1.5 h-1.5 rounded-full bg-white/40"></div>
            </div>
        </div>

    </a>
</div>


    <!-- SIDEBAR HEADER -->

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav x-data="{ selected: $persist('Dashboard') }">
            <!-- Menu Group -->
            {{-- Sidebar Menu --}}
            @if (Auth::user()->role === 'siswa')
                <ul class="flex flex-col gap-4 mb-6">

                    {{-- Dashboard --}}
                    <li>
                        <a href="{{ route('dashboard.index') }}"
                            class="menu-item group {{ Request::is('dashboard*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard">
                                <rect width="7" height="9" x="3" y="3" rx="1" />
                                <rect width="7" height="5" x="14" y="3" rx="1" />
                                <rect width="7" height="9" x="14" y="12" rx="1" />
                                <rect width="7" height="5" x="3" y="16" rx="1" />
                            </svg>
                            <span class="menu-item-text">Dashboard</span>
                        </a>
                    </li>
                    {{-- Profile --}}
                    <li>
                        <a href="{{ route('profile') }}"
                            class="menu-item {{ Request::is('profile*') ? 'menu-item-active' : 'menu-item-inactive' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-user-round-pen-icon lucide-user-round-pen">
                                <path d="M2 21a8 8 0 0 1 10.821-7.487" />
                                <path
                                    d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                                <circle cx="10" cy="8" r="5" />
                            </svg>
                            <span class="menu-item-text">Profile</span>
                        </a>
                    </li>

                    {{-- History --}}
                    <li>
                        <a href="{{ route('transaksi.history') }}"
                            class="menu-item group {{ Request::is('transaksi-history*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-history-icon lucide-history">
                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                                <path d="M3 3v5h5" />
                                <path d="M12 7v5l4 2" />
                            </svg>
                            <span class="menu-item-text">History</span>
                        </a>
                    </li>

                    {{-- Laporan --}}
                    <li>
                        <a href="{{ route('transaksi.report') }}"
                            class="menu-item group {{ Request::is('transaksi-report*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-notepad-text-icon lucide-notepad-text">
                                <path d="M8 2v4" />
                                <path d="M12 2v4" />
                                <path d="M16 2v4" />
                                <rect width="16" height="18" x="4" y="4" rx="2" />
                                <path d="M8 10h6" />
                                <path d="M8 14h8" />
                                <path d="M8 18h5" />
                            </svg>
                            <span class="menu-item-text">Laporan</span>
                        </a>
                    </li>

                </ul>
            @elseif(Auth::user()->role === 'wali_kelas')
                <ul class="flex flex-col gap-4 mb-6">
                    <li>
                        <a href="{{ route('dashboard.index') }}"
                            class="menu-item group {{ Request::is('dashboard*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard">
                                <rect width="7" height="9" x="3" y="3" rx="1" />
                                <rect width="7" height="5" x="14" y="3" rx="1" />
                                <rect width="7" height="9" x="14" y="12" rx="1" />
                                <rect width="7" height="5" x="3" y="16" rx="1" />
                            </svg>
                            <span class="menu-item-text">Dashboard</span>
                        </a>
                    </li>

                    {{-- Profile --}}
                    <li>
                        <a href="{{ route('profile') }}"
                            class="menu-item {{ Request::is('profile*') ? 'menu-item-active' : 'menu-item-inactive' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user-round-pen-icon lucide-user-round-pen">
                                <path d="M2 21a8 8 0 0 1 10.821-7.487" />
                                <path
                                    d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                                <circle cx="10" cy="8" r="5" />
                            </svg>
                            <span class="menu-item-text">Profile</span>
                        </a>
                    </li>

                    {{-- Menabung --}}
                    <li>
                        <a href="{{ route('transaksi-masuk.index') }}"
                            class="menu-item group {{ Request::is('transaksi-masuk*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-hand-coins-icon lucide-hand-coins">
                                <path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17" />
                                <path
                                    d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9" />
                                <path d="m2 16 6 6" />
                                <circle cx="16" cy="9" r="2.9" />
                                <circle cx="6" cy="5" r="3" />
                            </svg>
                            <span class="menu-item-text">Menabung</span>
                        </a>
                    </li>

                    {{-- Tarik Uang --}}
                    <li>
                        <a href="{{ route('transaksi-keluar.index') }}"
                            class="menu-item group {{ Request::is('transaksi-keluar*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-banknote-arrow-down-icon lucide-banknote-arrow-down">
                                <path d="M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5" />
                                <path d="m16 19 3 3 3-3" />
                                <path d="M18 12h.01" />
                                <path d="M19 16v6" />
                                <path d="M6 12h.01" />
                                <circle cx="12" cy="12" r="2" />
                            </svg>
                            <span class="menu-item-text">Tarik Tabungan</span>
                        </a>
                    </li>

                    {{-- Buat Akun Siswa --}}
                    <li>
                        <a href="{{ route('user-siswa.index') }}"
                            class="menu-item group {{ Request::is('user-siswa*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user-round-plus-icon lucide-user-round-plus">
                                <path d="M2 21a8 8 0 0 1 13.292-6" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M19 16v6" />
                                <path d="M22 19h-6" />
                            </svg>
                            <span class="menu-item-text">Akun Siswa</span>
                        </a>
                    </li>

                    {{-- Buat Akun Wali --}}
                    <li>
                        <a href="{{ route('user-wali.index') }}"
                            class="menu-item group {{ Request::is('user-wali*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user-round-plus-icon lucide-user-round-plus">
                                <path d="M2 21a8 8 0 0 1 13.292-6" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M19 16v6" />
                                <path d="M22 19h-6" />
                            </svg>
                            <span class="menu-item-text">Akun Wali</span>
                        </a>
                    </li>

                </ul>
            @endif
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
<!-- ===== Sidebar End ===== -->
