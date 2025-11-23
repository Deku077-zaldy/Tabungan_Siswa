<x-dashboard-layout :title="'History Transaksi'">

    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">History Transaksi</h1>
    <div
        class="overflow-hidden px-3 rounded-2xl border border-gray-200 bg-white p-4 pb-6 dark:border-gray-800 dark:bg-white/[0.03] space-y-4">
        <div class="p-5 bg-white border border-gray-200 rounded-xl shadow-theme-sm dark:border-gray-800 dark:bg-white/5">
            <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between mb-3">

                <div class="flex items-start w-full gap-4">
                    <div class="w-full">
                        <p class="text-base text-gray-800 dark:text-white/90 font-medium mb-2">
                            Transaksi Sebesar
                        </p>
                        <p class="text-base text-gray-800 dark:text-white/90 font-semibold">
                            Rp 100.000
                        </p>
                    </div>
                </div>

                <div
                    class="flex flex-col-reverse items-start justify-end w-full gap-3 xl:flex-row xl:items-center xl:gap-5">
                    <span
                        class="inline-flex rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-600
                    dark:bg-green-500/15 dark:text-green-400">
                        Transaksi Masuk
                    </span>
                    <div class="flex items-center justify-between w-full gap-5 xl:w-auto xl:justify-normal">
                        <div class="flex items-center gap-3">

                            <!-- ICON JAM + TANGGAL -->
                            <span class="flex items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 1.3335C4.32418 1.3335 1.33337 4.3243 1.33337 8.00016C1.33337 11.676 4.32418 14.6668 8 14.6668C11.6759 14.6668 14.6667 11.676 14.6667 8.00016C14.6667 4.3243 11.6759 1.3335 8 1.3335ZM8.66671 4.00016C8.66671 3.63197 8.36819 3.3335 8.00004 3.3335C7.63185 3.3335 7.33337 3.63197 7.33337 4.00016V8.00016C7.33337 8.17699 7.40366 8.34656 7.52869 8.47159L9.52869 10.4716C9.78804 10.731 10.211 10.731 10.4704 10.4716C10.7297 10.2123 10.7297 9.78928 10.4704 9.52993L8.66671 7.72623V4.00016Z">
                                    </path>
                                </svg>
                                12 Jan 2025
                            </span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div
            class="p-5 bg-white border border-gray-200 rounded-xl shadow-theme-sm dark:border-gray-800 dark:bg-white/5">
            <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between mb-3">

                <div class="flex items-start w-full gap-4">
                    <div class="w-full">
                        <p class="text-base text-gray-800 dark:text-white/90 font-medium mb-2">
                            Transaksi Sebesar
                        </p>
                        <p class="text-base text-gray-800 dark:text-white/90 font-semibold">
                            Rp 100.000
                        </p>
                    </div>
                </div>

                <div
                    class="flex flex-col-reverse items-start justify-end w-full gap-3 xl:flex-row xl:items-center xl:gap-5">
                    <span
                        class="inline-flex rounded-full bg-red-100 px-2 py-0.5 text-xs font-medium text-red-600
                        dark:bg-red-500/15 dark:text-red-400">
                        Transaksi Keluar
                    </span>
                    <div class="flex items-center justify-between w-full gap-5 xl:w-auto xl:justify-normal">
                        <div class="flex items-center gap-3">

                            <!-- ICON JAM + TANGGAL -->
                            <span class="flex items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 1.3335C4.32418 1.3335 1.33337 4.3243 1.33337 8.00016C1.33337 11.676 4.32418 14.6668 8 14.6668C11.6759 14.6668 14.6667 11.676 14.6667 8.00016C14.6667 4.3243 11.6759 1.3335 8 1.3335ZM8.66671 4.00016C8.66671 3.63197 8.36819 3.3335 8.00004 3.3335C7.63185 3.3335 7.33337 3.63197 7.33337 4.00016V8.00016C7.33337 8.17699 7.40366 8.34656 7.52869 8.47159L9.52869 10.4716C9.78804 10.731 10.211 10.731 10.4704 10.4716C10.7297 10.2123 10.7297 9.78928 10.4704 9.52993L8.66671 7.72623V4.00016Z">
                                    </path>
                                </svg>
                                12 Jan 2025
                            </span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
