<!-- ===== Sidebar Start ===== -->
<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="index.html">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="./images/logo/logo.svg" alt="Logo" />
                <img class="hidden dark:block" src="./images/logo/logo-dark.svg" alt="Logo" />
            </span>

            <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'" src="./images/logo/logo-icon.svg"
                alt="Logo" />
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
                        <a href="#" class="menu-item group menu-item-inactive">
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
                        <a href="#" class="menu-item group menu-item-inactive">
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
                <li>
                    <a href="{{ route('dashboard.index') }}"
                        class="menu-item group {{ Request::is('dashboard*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard">
                            <rect width="7" height="9" x="3" y="3" rx="1" />
                            <rect width="7" height="5" x="14" y="3" rx="1" />
                            <rect width="7" height="9" x="14" y="12" rx="1" />
                            <rect width="7" height="5" x="3" y="16" rx="1" />
                        </svg>
                        <span class="menu-item-text">Dashboard</span>
                    </a>
                </li>
                <ul class="flex flex-col gap-4 mb-6">

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

                    {{-- Kelas --}}
                    <li>
                        <a href="#" class="menu-item group menu-item-inactive">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-university-icon lucide-university">
                                <path d="M14 21v-3a2 2 0 0 0-4 0v3" />
                                <path d="M18 12h.01" />
                                <path d="M18 16h.01" />
                                <path
                                    d="M22 7a1 1 0 0 0-1-1h-2a2 2 0 0 1-1.143-.359L13.143 2.36a2 2 0 0 0-2.286-.001L6.143 5.64A2 2 0 0 1 5 6H3a1 1 0 0 0-1 1v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2z" />
                                <path d="M6 12h.01" />
                                <path d="M6 16h.01" />
                                <circle cx="12" cy="10" r="2" />
                            </svg>
                            <span class="menu-item-text">Kelas</span>
                        </a>
                    </li>

                    {{-- Menabung --}}
                    <li>
                        <a href="#" class="menu-item group menu-item-inactive">
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
                        <a href="#" class="menu-item group menu-item-inactive">
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
                            <span class="menu-item-text">Tarik Uang</span>
                        </a>
                    </li>

                    {{-- Buat Akun --}}
                    <li>
                        <a href="#" class="menu-item group menu-item-inactive">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user-round-plus-icon lucide-user-round-plus">
                                <path d="M2 21a8 8 0 0 1 13.292-6" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M19 16v6" />
                                <path d="M22 19h-6" />
                            </svg>
                            <span class="menu-item-text">Buat Akun</span>
                        </a>
                    </li>

                </ul>
            @endif
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
<!-- ===== Sidebar End ===== -->
