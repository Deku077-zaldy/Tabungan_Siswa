<x-dashboard-layout :title="'Dashboard'">
    <div class="col-span-12">
        <h1 class="text-2xl mb-5">Welcome back ! {{ Auth::user()->role }}</h1>
    </div>
    @if (Auth::user()->role == 'wali_kelas')
        <div
            class="rounded-xl bg-white flex flex-col md:col-span-2 border border-gray-200 p-5 dark:border-gray-800 dark:bg-white/[0.03] text-white mb-5">
            <div class="bg-gradient-to-br bg-brand-600 w-full h-32 rounded-t-lg mb-12 relative shadow-xl">
                <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                    <div class="bg-brand-600  rounded-full p-1">
                        <img src="{{ asset('images/avatarwali.png') }}" alt="Avatar"
                            class="w-24 h-24 rounded-full border-4 border-white shadow-2xl object-cover">

                    </div>
                </div>
            </div>
            <div class="text-center">
                <h2 class="text-xl font-semibold mt-5 text-gray-800 dark:text-white/90">
                    {{ Auth::user()->username }}</h2>
                <p class="text-gray-700 dark:text-gray-400 mt-2">Kelas {{ Auth::user()->kelas }} </p>
            </div>
        </div>
        <div
            class="w-full mb-3 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/5 shadow-sm">
            <div class="flex flex-col items-center text-center gap-2">
                <!-- Icon -->
                <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-wallet">
                        <path
                            d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1">
                        </path>
                        <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                    </svg>
                </div>

                <!-- Title -->
                <span class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Total Tabungan Kelas {{ Auth::user()->kelas }}
                </span>

                <!-- Amount -->
                <span class="text-3xl font-bold text-blue-500">
                    Rp. {{ number_format($totalTabunganKelas ?? 0, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Card Income -->
            <div
                class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 
               dark:bg-white/[0.03] md:p-6 w-full md:w-1/2">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 bg-green-100 text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-banknote-arrow-up-icon lucide-banknote-arrow-up">
                        <path d="M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5" />
                        <path d="M18 12h.01" />
                        <path d="M19 22v-6" />
                        <path d="m22 19-3-3-3 3" />
                        <path d="M6 12h.01" />
                        <circle cx="12" cy="12" r="2" />
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Transaksi Masuk</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $rekapTransaksi->setor ?? 0 }} Transaksi Masuk
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Card Riwayat -->
            <div
                class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800
               dark:bg-white/[0.03] md:p-6 w-full md:w-1/2">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 bg-red-100 text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-banknote-arrow-down-icon lucide-banknote-arrow-down">
                        <path d="M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5" />
                        <path d="m16 19 3 3 3-3" />
                        <path d="M18 12h.01" />
                        <path d="M19 16v6" />
                        <path d="M6 12h.01" />
                        <circle cx="12" cy="12" r="2" />
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Transaksi Keluar</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $rekapTransaksi->tarik ?? 0 }} Transaksi Keluar
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div
            class="rounded-xl bg-white flex flex-col md:col-span-2 border border-gray-200 p-5 dark:border-gray-800 dark:bg-white/[0.03] text-white mb-5">
            <div class="bg-gradient-to-br bg-brand-600 w-full h-32 rounded-t-lg mb-12 relative shadow-xl">
                <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                    <div class="bg-brand-600  rounded-full p-1">
                        <img src="{{ asset('images/avatarsiswa.png') }}" alt="Avatar"
                            class="w-24 h-24 rounded-full border-4 border-white shadow-2xl object-cover">

                    </div>
                </div>
            </div>
            <div class="text-center">
                <h2 class="text-xl font-semibold mt-5 text-gray-800 dark:text-white/90">
                    {{ Auth::user()->username }}</h2>
                <p class="text-gray-700 dark:text-gray-400 mt-2">Kelas {{ Auth::user()->kelas }} </p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Card Income -->
            <div
                class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 
               dark:bg-white/[0.03] md:p-6 w-full md:w-1/2">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 bg-green-100 text-green-500">
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
                        <span class="text-sm text-gray-500 dark:text-gray-400">Total Tabungan</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            Rp {{ $info ? number_format($info['total'], 0, ',', '.') : 0 }}
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Card Riwayat -->
            <div
                class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800
               dark:bg-white/[0.03] md:p-6 w-full md:w-1/2">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 bg-yellow-100 text-yellow-500">
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
                        <span class="text-sm text-gray-500 dark:text-gray-400 capitalize">
                            Riwayat Terakhir
                            @if ($info['transaksi_terakhir'])
                                {{ $info['transaksi_terakhir']->jenis }}
                            @endif
                        </span>

                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            @if ($info['transaksi_terakhir'])
                                Rp {{ number_format($info['transaksi_terakhir']->jumlah, 0, ',', '.') }}
                            @else
                                Belum ada transaksi
                            @endif
                        </h4>

                        @if ($info['transaksi_terakhir'])
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                {{ $info['transaksi_terakhir']->created_at->translatedFormat('d F Y, H:i') }} WITA
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div>
            {{-- Grafik Tabungan Per Tahun --}}
            @if (isset($totalSaldoPerTahun) && count($totalSaldoPerTahun) > 0)
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800
        dark:bg-white/[0.03] md:p-6 mt-6">

                    <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-4">
                        Grafik Tabungan Per Tahun
                    </h4>

                    <canvas id="tabunganChart" height="120"></canvas>
                </div>

                {{-- Chart.js CDN --}}
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                {{-- Script untuk membuat grafik --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const rawData = @json($totalSaldoPerTahun);

                        const labels = rawData.map(item => item.tahun);
                        const data = rawData.map(item => Number(item.total_tabungan));

                        const backgroundColors = [
                            'rgba(59, 130, 246, 0.6)', // biru
                            'rgba(34, 197, 94, 0.6)', // hijau
                            'rgba(234, 179, 8, 0.6)', // kuning
                            'rgba(239, 68, 68, 0.6)', // merah
                            'rgba(168, 85, 247, 0.6)', // ungu
                            'rgba(14, 165, 233, 0.6)' // cyan
                        ];

                        const borderColors = [
                            'rgba(59, 130, 246, 1)',
                            'rgba(34, 197, 94, 1)',
                            'rgba(234, 179, 8, 1)',
                            'rgba(239, 68, 68, 1)',
                            'rgba(168, 85, 247, 1)',
                            'rgba(14, 165, 233, 1)'
                        ];

                        const ctx = document.getElementById('tabunganChart').getContext('2d');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Total Tabungan (Rp)',
                                    data: data,
                                    backgroundColor: backgroundColors,
                                    borderColor: borderColors,
                                    borderWidth: 2,
                                    borderRadius: 8
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return 'Rp ' + new Intl.NumberFormat('id-ID')
                                                    .format(context.raw);
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            callback: function(value) {
                                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    });
                </script>
            @else
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800
        dark:bg-white/[0.03] md:p-6 mt-6 text-center text-gray-500">
                    Belum ada data tabungan untuk ditampilkan.
                </div>
            @endif

        </div>
    @endif
</x-dashboard-layout>
