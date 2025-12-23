<x-dashboard-layout :title="'Tarik Transaksi'">

    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Tarik Transaksi</h1>
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
