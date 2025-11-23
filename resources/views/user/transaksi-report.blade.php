<x-dashboard-layout :title="'Laporan Transaksi'">

    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Laporan Transaksi</h1>

    <div class="space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="space-y-4">
                <!-- CARD TRANSAKSI -->
                <div
                    class="p-5 bg-white border border-gray-200 rounded-xl shadow-theme-sm dark:border-gray-800 dark:bg-white/5">
                    <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between mb-3">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Januari 2025
                        </h2>
                        <div class="flex flex-col xl:flex-row gap-3 items-start xl:items-center">
                            <!-- TOMBOL DOWNLOAD -->
                            <a href="#"
                                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" class="fill-current">
                                    <path
                                        d="M8 1.33337C7.63181 1.33337 7.33333 1.63185 7.33333 2.00004V8.39053L5.5286 6.5858C5.26925 6.32645 4.84628 6.32645 4.58693 6.5858C4.32758 6.84515 4.32758 7.26812 4.58693 7.52747L7.5286 10.4691C7.78795 10.7285 8.21092 10.7285 8.47027 10.4691L11.4119 7.52747C11.6713 7.26812 11.6713 6.84515 11.4119 6.5858C11.1526 6.32645 10.7296 6.32645 10.4703 6.5858L8.66667 8.39053V2.00004C8.66667 1.63185 8.36819 1.33337 8 1.33337Z">
                                    </path>
                                    <path
                                        d="M2.66667 10.6666C2.29848 10.6666 2 10.9651 2 11.3333V12.6666C2 13.403 2.59695 13.9999 3.33333 13.9999H12.6667C13.403 13.9999 14 13.403 14 12.6666V11.3333C14 10.9651 13.7015 10.6666 13.3333 10.6666C12.9651 10.6666 12.6667 10.9651 12.6667 11.3333V12.6666H3.33333V11.3333C3.33333 10.9651 3.03486 10.6666 2.66667 10.6666Z">
                                    </path>
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-dashboard-layout>
