<x-dashboard-layout :title="'Tarik Tabungan'">

    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Tarik Tabungan</h1>
    <div x-data="dataTable()"
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex flex-col gap-5 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Daftar Siswa Kelas X
                </h3>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                {{-- Search --}}
                <form>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 pointer-events-none top-1/2 left-4">
                            <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z"
                                    fill=""></path>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search... " x-model="search"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-[42px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    </div>
                </form>
            </div>
        </div>

        <div class="max-w-full overflow-x-auto custom-scrollbar">
            <!-- TABLE -->
            <table class="min-w-full">
                <!-- HEADER -->
                <thead class="border-y border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 text-center">
                            <span class="block text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                                No
                            </span>
                        </th>

                        <th class="px-6 py-3 text-left">
                            <span class="block text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                                Nama Lengkap
                            </span>
                        </th>

                        <th class="px-6 py-3 text-left">
                            <span class="block text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                                Total Tabungan
                            </span>
                        </th>

                        <th class="px-6 py-3 text-center">
                            <span class="block text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                                Action
                            </span>
                        </th>
                    </tr>
                </thead>


                <!-- BODY -->
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">

                    <template x-for="(siswa, index) in filteredData" :key="siswa.id">
                        <tr>
                            <!-- No -->
                            <td class="px-6 py-3 whitespace-nowrap">
                                <p class="text-gray-700 text-theme-sm dark:text-gray-400 text-center"
                                    x-text="index + 1"> </p>
                                <div class="flex items-center">
                                </div>
                            </td>

                            <!-- Nama -->
                            <td class="px-6 py-3 whitespace-nowrap">
                                <p class="text-gray-700 text-theme-sm dark:text-gray-400" x-text="siswa.nama"></p>
                            </td>

                            <!-- Total Tabungan -->
                            <td class="px-6 py-3 whitespace-nowrap">
                                <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                    Rp <span x-text="Number(siswa.total_tabungan).toLocaleString('id-ID')"></span>
                                </p>
                            </td>

                            <!-- Action -->
                            <td class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    
                                    <a :href="`{{ route('transaksi.create', ':id') }}`.replace(':id', siswa.id)"
                                        class="inline-block rounded-lg bg-green-500 px-4 py-2 text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 f
                                        ocus:ring-green-300 dark:focus:ring-green-900">
                                        Transaksi
                                    </a>
                                    <a :href="`{{ route('user-siswa.history', ':id') }}`.replace(':id', siswa.id)"
                                        class="inline-block rounded-lg bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                        History
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </template>

                    <!-- EMPTY -->
                    <tr x-show="filteredData.length === 0">
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                            Data tidak ditemukan
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- SCRIPT -->
        <script>
            function dataTable() {
                return {
                    search: '',
                    data: @json($datasiswa),

                    get filteredData() {
                        const search = this.search.toLowerCase();

                        return this.data.filter(siswa =>
                            siswa.nama.toLowerCase().includes(search)
                        );
                    }
                }
            }
        </script>


    </div>
</x-dashboard-layout>
