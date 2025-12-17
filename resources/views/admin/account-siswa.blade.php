<x-dashboard-layout :title="'Akun Siswa'">

    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Akun Siswa Kelas {{ $kelasWali }}</h1>
    @if (session('success'))
        <div
            class="rounded-xl border border-success-500 bg-success-50 p-4 dark:border-success-500/30 dark:bg-success-500/15">
            <div class="flex items-start gap-3">
                <div class="-mt-0.5 text-success-500">
                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z"
                            fill=""></path>
                    </svg>
                </div>

                <div>
                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                        Success Message
                    </h4>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    <div class="mb-3 mt-3">
        <a href="{{ route('user-siswa.create') }}"
            class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
            Tambah Akun
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-square-plus-icon lucide-square-plus">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M8 12h8" />
                <path d="M12 8v8" />
            </svg>
        </a>
    </div>
    <div
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex flex-col gap-5 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Daftar Siswa Kelas {{ $kelasWali }}
                </h3>
            </div>
        </div>

        <div class="max-w-full overflow-x-auto custom-scrollbar">
            <table class="min-w-full">
                <!-- table header start -->
                <thead class="border-gray-100 border-y bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 whitespace-nowrap">
                            <div class="flex items-center">

                                <div>
                                    <span class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        No
                                    </span>
                                </div>
                            </div>
        </div>
        </th>
        <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    Nama Siswa
                </p>
            </div>
        </th>
        <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    Status
                </p>
            </div>
        </th>
        <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    No HP
                </p>
            </div>
        </th>
        <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    Jumlah Tabungan
                </p>
            </div>
        </th>
        <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center justify-center">
                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    Action
                </p>
            </div>
        </th>
        </tr>
        </thead>
        <!-- table header end -->

        <!-- table body start -->
        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
            @foreach ($siswaKelas as $index => $siswa)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                {{ $index + 1 }}
                            </p>
                        </div>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                {{ $siswa->nama }}
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                {{ $siswa->status }}
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                {{ $siswa->user->no_hp }}
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                {{ 'Rp ' . number_format($siswa->total_tabungan, 0, ',', '.') }}

                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap flex items-center justify-center gap-2">
                        <div class="flex items-center justify-center gap-2">
                            <a href=""
                                class="inline-block rounded-lg bg-blue-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                History
                            </a>
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <a href=""
                                class="inline-block rounded-lg bg-blue-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <!-- table body end -->
        </table>
    </div>
</x-dashboard-layout>
