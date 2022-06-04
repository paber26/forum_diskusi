<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <span class="font-bold text-2xl mt-4 mb-3">Kelola Thread</span>
        <!-- <span class="font-bold text-2xl mt-4">Kelola Thread</span> -->

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="pb-3 flex justify-end">
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Thread">
                </div>
            </div>
            <table class="w-full text-left">
                <thead class="text-base text-gray-700 uppercase bg-blue-300">
                    <tr class="text-center divide-x divide-gray-400">
                        <th class="px-3 py-2">No</th>
                        <th class="px-3 py-2">Nama Pengguna</th>
                        <th class="px-3 py-2">Isi Thread</th>
                        <th class="px-3 py-2">Dukungan</th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b divide-x divide-gray-400">
                        <td class="p-3 font-medium text-gray-900 whitespace-nowrap">1</td>
                        <td class="p-3">Bernaldo Napitupulu</td>
                        <td class="p-3">Teman saya pernah jadi pasien di salah satu RSJ di Solo. Sekitar tahun 2009. Anaknya gaul, cakep, termasuk dari keluarga terpandang meskipun masuk kategori anak nakal di sekolah. Biasa lah, anak umur 16 tahun lg nakal2nya.</td>
                        <td class="p-3 text-center">7</td>
                        <td class="p-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b divide-x divide-gray-400">
                        <td class="p-3 font-medium text-gray-900 whitespace-nowrap">2</td>
                        <td class="p-3">Bernaldo Napitupulu</td>
                        <td class="p-3">Teman saya pernah jadi pasien di salah satu RSJ di Solo. Sekitar tahun 2009. Anaknya gaul, cakep, termasuk dari keluarga terpandang meskipun masuk kategori anak nakal di sekolah. Biasa lah, anak umur 16 tahun lg nakal2nya.</td>
                        <td class="p-3 text-center">7</td>
                        <td class="p-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b divide-x divide-gray-400">
                        <td class="p-3 font-medium text-gray-900 whitespace-nowrap">3</td>
                        <td class="p-3">Bernaldo Napitupulu</td>
                        <td class="p-3">Teman saya pernah jadi pasien di salah satu RSJ di Solo. Sekitar tahun 2009. Anaknya gaul, cakep, termasuk dari keluarga terpandang meskipun masuk kategori anak nakal di sekolah. Biasa lah, anak umur 16 tahun lg nakal2nya.</td>
                        <td class="p-3 text-center">7</td>
                        <td class="p-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</template>

<script>
export default {
    methods: {
        coba() {
            this.$swal('Halo')
        }
    }
}
</script>
