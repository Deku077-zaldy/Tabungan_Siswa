<x-dashboard-layout :title="'Profil Pengguna'">

    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Profile</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- ========== CARD INFORMASI USER ========== -->
        <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800 bg-white dark:bg-white/5">
            <h4 class="text-lg font-semibold text-gray-800 mb-6 dark:text-white/90">Informasi User</h4>

            <div class="grid grid-cols-1 gap-5">

                <!-- Username -->
                <div>
                    <p class="mb-1.5 text-sm font-bold text-gray-700 dark:text-gray-400">Username</p>
                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">john_doe</p>
                </div>

                <!-- Hak Akses -->
                <div>
                    <p class="mb-1.5 text-sm font-bold text-gray-700 dark:text-gray-400">Hak Akses</p>
                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">Admin</p>
                </div>

                <!-- ID -->
                <div>
                    <p class="mb-1.5 text-sm font-bold text-gray-700 dark:text-gray-400">ID</p>
                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">USR-02939</p>
                </div>

                <!-- Telepon -->
                <div>
                    <p class="mb-1.5 text-sm font-bold text-gray-700 dark:text-gray-400">Telepon</p>
                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">081234567890</p>
                </div>

            </div>
        </div>

        <!-- ========== CARD RESET PASSWORD ========== -->
        <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800 bg-white dark:bg-white/5">
            <h4 class="text-lg font-semibold text-gray-800 mb-6 dark:text-white/90">Reset Password</h4>

            <div class="flex flex-col gap-5">

                <!-- Password Lama -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Password
                        Lama</label>
                    <input type="password"
                        class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                </div>

                <!-- Password Baru -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Password
                        Baru</label>
                    <input type="password"
                        class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Konfirmasi
                        Password</label>
                    <input type="password"
                        class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                </div>

                <!-- Tombol -->
                <button class="mt-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-medium text-white hover:bg-blue-700">
                    Simpan Password Baru
                </button>

            </div>
        </div>

    </div>
</x-dashboard-layout>
