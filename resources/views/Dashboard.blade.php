<x-dashboard-layout>
    <div class="col-span-12">
        <h1 class="text-2xl mb-5">Welcome back ! {{ Auth::user()->role }}</h1>
    </div>
    <div
        class="rounded-xl bg-white flex flex-col md:col-span-2 border border-gray-200 p-5 dark:border-gray-800 dark:bg-white/[0.03] text-white mb-5">
        <div class="bg-gradient-to-br bg-brand-600 w-full h-32 rounded-t-lg mb-12 relative shadow-xl">
            <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                <div class="bg-brand-600  rounded-full p-1">
                    <img src="https://nexelab.my.id/assets/profile.png" alt="Avatar"
                        class="w-24 h-24 rounded-full border-white shadow-2xl">
                </div>
            </div>
        </div>
        <div class="text-center">
            <h2 class="text-xl font-semibold mt-5 text-gray-800 dark:text-white/90">
                {{ Auth::user()->username }}</h2>
            <p class="text-gray-700 dark:text-gray-400 mt-2">Kelas 5 </p>
        </div>
    </div>
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Card Income -->
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 
               dark:bg-white/[0.03] md:p-6 w-full md:w-1/2">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-piggy-bank">
                    <path
                        d="M11 17h3v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3a3.16 3.16 0 0 0 2-2h1a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1a5 5 0 0 0-2-4V3a4 4 0 0 0-3.2 1.6l-.3.4H11a6 6 0 0 0-6 6v1a5 5 0 0 0 2 4v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1z" />
                    <path d="M16 10h.01" />
                    <path d="M2 8v1a2 2 0 0 0 2 2h1" />
                </svg>
            </div>

            <div class="mt-5 flex items-end justify-between">
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Income</span>
                    <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                        Rp 12.500.000
                    </h4>
                </div>
            </div>
        </div>

        <!-- Card Riwayat -->
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800
               dark:bg-white/[0.03] md:p-6 w-full md:w-1/2">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-history">
                    <path d="M3 3v5h5" />
                    <path d="M3.05 13A9 9 0 1 0 6 6.34L3 8" />
                    <path d="M12 7v5l4 2" />
                </svg>
            </div>

            <div class="mt-5 flex items-end justify-between">
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Riwayat Terakhir</span>
                    <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                        Setoran • Rp 20.000
                    </h4>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        12 November 2025, 14:22 WITA
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
