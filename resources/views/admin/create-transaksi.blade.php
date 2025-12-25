<x-dashboard-layout :title="'Tarik Transaksi'">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Tarik Transaksi</h1>
    @if (session('error'))
        <div class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15">
            <div class="flex items-start gap-3">
                <div class="-mt-0.5 text-error-500">
                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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
    <div class="mb-6 rounded-2xl border bg-white border-gray-200 p-5 lg:p-6 dark:border-gray-800">
        <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
            <div class="flex w-full flex-col items-center gap-6 xl:flex-row">
                <div class="h-20 w-20 overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2560px-User_icon_2.svg.png"
                        alt="user">
                </div>
                <div class="order-3 xl:order-2">
                    <h4 class="mb-2 text-center text-lg font-semibold text-gray-800 xl:text-left dark:text-white/90">
                        {{ $siswa->nama }}
                    </h4>
                    <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Siswa Kelas {{ $siswa->user->kelas }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800 bg-white dark:bg-white/5">
        <h4 class="text-lg font-semibold text-gray-800 mb-6 dark:text-white/90">
            Tarik Tabungan
        </h4>

        <form action="{{ route('transaksi.store') }}" method="POST" x-data="{ jenis: 'setor' }">
            @csrf

            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
            <input type="hidden" name="jenis" :value="jenis">
            <input type="hidden" name="dibuat_oleh" value="{{ $waliKelasID }}">

            <div class="flex flex-col gap-6">

                <!-- Saldo -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Saldo Saat Ini
                    </label>
                    <input type="text" readonly value="Rp {{ number_format($siswa->total_tabungan, 0, ',', '.') }}"
                        class="h-11 w-full rounded-lg border border-gray-200 bg-gray-100 px-4 py-2.5 text-sm text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white/70">
                </div>

                <!-- PILIHAN JENIS -->
                <div>
                    <label class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Jenis Transaksi
                    </label>

                    <div class="flex flex-wrap items-center gap-8">

                        <!-- MENABUNG -->
                        <label
                            class="flex cursor-pointer items-center text-sm font-medium text-gray-700 dark:text-gray-400">
                            <input type="radio" class="sr-only" value="setor" x-model="jenis">

                            <div :class="jenis === 'setor'
                                ?
                                'border-green-500 bg-green-500' :
                                'border-gray-300 dark:border-gray-700'"
                                class="mr-3 flex h-5 w-5 items-center justify-center rounded-full border-[1.25px]">
                                <span class="h-2 w-2 rounded-full bg-white"></span>
                            </div>

                            Menabung
                        </label>

                        <!-- TARIK -->
                        <label
                            class="flex cursor-pointer items-center text-sm font-medium text-gray-700 dark:text-gray-400">
                            <input type="radio" class="sr-only" value="tarik" x-model="jenis">

                            <div :class="jenis === 'tarik'
                                ?
                                'border-red-500 bg-red-500' :
                                'border-gray-300 dark:border-gray-700'"
                                class="mr-3 flex h-5 w-5 items-center justify-center rounded-full border-[1.25px]">
                                <span class="h-2 w-2 rounded-full bg-white"></span>
                            </div>

                            Tarik Tabungan
                        </label>

                    </div>
                </div>

                <!-- JUMLAH -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        <span x-text="jenis === 'setor' ? 'Jumlah Menabung' : 'Jumlah Tarik'"></span>
                    </label>

                    <input type="number" name="jumlah" min="1000"
                        :max="jenis === 'tarik' ? {{ $siswa->total_tabungan }} : null" required
                        placeholder="Masukkan jumlah"
                        class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800
                    focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10
                    dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Minimal transaksi Rp 1.000
                    </p>

                    @error('jumlah')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CATATAN -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Catatan (Opsional)
                    </label>
                    <textarea name="catatan" rows="3" placeholder="Contoh: Tabungan mingguan / Keperluan sekolah"
                        class="dark:bg-dark-900 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800
                    focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10
                    dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"></textarea>
                </div>

                <!-- TOMBOL -->
                <button type="submit"
                    :class="jenis === 'setor'
                        ?
                        'bg-green-600 hover:bg-green-700' :
                        'bg-red-600 hover:bg-red-700'"
                    class="mt-2 rounded-xl px-5 py-3 text-sm font-medium text-white">
                    <span x-text="jenis === 'setor' ? 'Simpan Tabungan' : 'Tarik Tabungan'"></span>
                </button>

            </div>
        </form>

    </div>
</x-dashboard-layout>
