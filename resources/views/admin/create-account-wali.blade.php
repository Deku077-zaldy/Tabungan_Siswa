<x-dashboard-layout :title="'Akun Wali'">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Akun Wali</h1>
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
        <!-- ========== FORM TAMBAH WALI KELAS ========== -->
        <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800 bg-white dark:bg-white/5">
            <h4 class="text-lg font-semibold text-gray-800 mb-6 dark:text-white/90">Form Tambah Wali</h4>

            <form action="{{ route('user-wali.store') }}" method="POST">
                @csrf

                <div class="flex flex-col gap-5">
                    @if (session('error'))
                        <div
                            class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15">
                            <div class="flex items-start gap-3">
                                <div class="-mt-0.5 text-error-500">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.3499 12.0004C20.3499 16.612 16.6115 20.3504 11.9999 20.3504C7.38832 20.3504 3.6499 16.612 3.6499 12.0004C3.6499 7.38881 7.38833 3.65039 11.9999 3.65039C16.6115 3.65039 20.3499 7.38881 20.3499 12.0004ZM11.9999 22.1504C17.6056 22.1504 22.1499 17.6061 22.1499 12.0004C22.1499 6.3947 17.6056 1.85039 11.9999 1.85039C6.39421 1.85039 1.8499 6.3947 1.8499 12.0004C1.8499 17.6061 6.39421 22.1504 11.9999 22.1504ZM13.0008 16.4753C13.0008 15.923 12.5531 15.4753 12.0008 15.4753L11.9998 15.4753C11.4475 15.4753 10.9998 15.923 10.9998 16.4753C10.9998 17.0276 11.4475 17.4753 11.9998 17.4753L12.0008 17.4753C12.5531 17.4753 13.0008 17.0276 13.0008 16.4753ZM11.9998 6.62898C12.414 6.62898 12.7498 6.96476 12.7498 7.37898L12.7498 13.0555C12.7498 13.4697 12.414 13.8055 11.9998 13.8055C11.5856 13.8055 11.2498 13.4697 11.2498 13.0555L11.2498 7.37898C11.2498 6.96476 11.5856 6.62898 11.9998 6.62898Z"
                                            fill="#F04438"></path>
                                    </svg>
                                </div>

                                <div>
                                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                        Error Message
                                    </h4>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ session('error') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Username -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Username
                        </label>
                        <input type="text" name="username" required placeholder="Contoh: wali_kelas1"
                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 
                                focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 
                                dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                                dark:focus:border-brand-800"
                            value="{{ old('username') }}">
                        @error('username')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Password<span class="text-error-500">*</span>
                        </label>
                        <div x-data="{ showPassword: false }" class="relative">
                            <input name="password" :type="showPassword ? 'text' : 'password'"
                                placeholder="Enter your password"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                            <span @click="showPassword = !showPassword"
                                class="absolute z-30 text-gray-500 -translate-y-1/2 cursor-pointer right-4 top-1/2 dark:text-gray-400">
                                <svg x-show="!showPassword" class="fill-current" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z"
                                        fill="#98A2B3" />
                                </svg>
                                <svg x-show="showPassword" class="fill-current" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z"
                                        fill="#98A2B3" />
                                </svg>
                            </span>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Nama Lengkap
                        </label>
                        <input type="text" name="nama" required placeholder="Contoh: John Doe"
                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 
                                focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 
                                dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                                dark:focus:border-brand-800"
                            value="{{ old('nama') }}">
                        @error('nama')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- No Hp -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Nomor HP
                        </label>
                        <input type="text" name="no_hp" required placeholder="Contoh: 08123456789"
                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 
                                focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 
                                dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                                dark:focus:border-brand-800"
                            value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Wali Kelas -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Wali Kelas
                        </label>
                        <input type="number" name="kelas" required placeholder="1"
                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 
                                focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 
                                dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                                dark:focus:border-brand-800"
                            value="{{ old('kelas') }}">
                        @error('kelas')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            NIP
                        </label>
                        <input type="text" name="nip" required placeholder="Contoh: 123456789"
                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 
                                focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 
                                dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                                dark:focus:border-brand-800"
                            value="{{ old('nip') }}">
                        @error('nip')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <button
                        class="mt-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-medium text-white hover:bg-blue-700">
                        Simpan Wali Kelas
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
