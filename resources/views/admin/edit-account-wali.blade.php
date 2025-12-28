<x-dashboard-layout :title="'Akun Wali'">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Akun Wali</h1>
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
        <!-- ========== FORM TAMBAH WALI KELAS ========== -->
        <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800 bg-white dark:bg-white/5">
            <h4 class="text-lg font-semibold text-gray-800 mb-6 dark:text-white/90">Update Data Wali</h4>

            <form action="{{ route('user-wali.update', $wali->id) }}" method="POST">
                @method('PUT')
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
                            value="{{ old('username', $wali->user->username) }}">
                        @error('username')
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
                            value="{{ old('nama', $wali->nama) }}">
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
                            value="{{ old('no_hp', $wali->user->no_hp) }}">
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
                            value="{{ old('kelas', $wali->user->kelas) }}">
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
                            value="{{ old('nip', $wali->nip) }}">
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
