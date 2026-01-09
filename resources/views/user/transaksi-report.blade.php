<x-dashboard-layout :title="'Laporan Transaksi'">

    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Laporan Transaksi</h1>

    <div class="w-full">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Filter Periode Laporan</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Pilih rentang tanggal awal dan akhir untuk mengunduh dokumen transaksi.</p>
            </div>

            <form action="{{ route('transaksi.report.download') }}" method="GET" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="relative">
                        <label class="text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2 block">
                            Tanggal Mulai
                        </label>
                        <div class="relative">
                            <input type="text" id="start_date" name="start_date" placeholder="Pilih Tanggal Mulai" readonly
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-800 dark:text-white cursor-pointer">
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <label class="text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2 block">
                            Tanggal Selesai
                        </label>
                        <div class="relative">
                            <input type="text" id="end_date" name="end_date" placeholder="Pilih Tanggal Selesai" readonly
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-800 dark:text-white cursor-pointer">
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex justify-end pt-4 border-t border-gray-100 dark:border-gray-800">
                    <button type="submit"
                        class="w-full md:w-auto flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-8 py-4 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition-all hover:bg-blue-700 active:scale-[0.98]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Download Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Tanggal Mulai
            const startPicker = flatpickr("#start_date", {
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d F Y",
                onChange: function(selectedDates, dateStr, instance) {
                    // Set minimal tanggal selesai adalah tanggal mulai yang dipilih
                    endPicker.set('minDate', dateStr);
                }
            });

            // Inisialisasi Tanggal Selesai
            const endPicker = flatpickr("#end_date", {
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d F Y",
            });
        });
    </script>

    <style>
        /* Custom Styling Flatpickr untuk Dark Mode & Rounded */
        .flatpickr-calendar {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid #e5e7eb;
            padding: 5px;
        }
        .dark .flatpickr-calendar {
            background: #111827;
            border-color: #374151;
            color: #fff;
        }
        .dark .flatpickr-day { color: #d1d5db; }
        .dark .flatpickr-day.selected { background: #3b82f6; border-color: #3b82f6; }
        .dark .flatpickr-months .flatpickr-month, 
        .dark .flatpickr-weekdays { background: transparent; color: #fff; fill: #fff; }
        .dark .flatpickr-current-month .flatpickr-monthDropdown-months { background: #111827; }
    </style>

</x-dashboard-layout>