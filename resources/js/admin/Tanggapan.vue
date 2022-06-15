<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <span class="font-bold text-2xl mt-4 mb-3">Kelola Tanggapan</span>
        <!-- <span class="font-bold text-2xl mt-4">Kelola Thread</span> -->

        <div class="relative overflow-x-auto">
            <div class="pb-3 flex justify-end">
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari tanggapan">
                </div>
            </div>
            <table class="w-full text-left">
                <thead class="text-base text-gray-700 uppercase bg-blue-300">
                    <tr class="text-center divide-x divide-gray-400">
                        <th class="px-3 py-2">No</th>
                        <th class="px-3 py-2">Nama Penanggap</th>
                        <th class="px-3 py-2">Isi Tanggapan</th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b divide-x divide-gray-400" v-for="index in daftartanggapan.length" :key="index.idtn">
                        <td class="p-3 font-medium text-gray-900 text-center">{{ index }}</td>
                        <td class="p-3">
                            <span>{{ daftartanggapan[index-1].nama }}</span>
                            <div class="text-xxs">(NIM: {{ daftartanggapan[index-1].nimtn }})</div>
                        </td>
                        <td class="p-3">
                            <a @click.prevent="lihattanggapan(daftartanggapan[index-1].idt, 'Tanggapan')" class="flex items-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                                <span class="ml-2 font-bold">{{ daftartanggapan[index-1].judul }}</span>
                            </a>
                            <hr>
                            <div class="text-xs italic">Menanggapi pada {{ daftartanggapan[index-1].date }}</div>
                            <span v-html="daftartanggapan[index-1].isi"></span>
                        </td>
                        <td class="p-3">
                            <div class="flex justify-center">
                                <button @click.prevent="hapus(daftartanggapan[index-1].idt)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span class="text-sm">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-12"></div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            daftartanggapan: '',
            isactive: 'thread',
        }
    },
    mounted() {
        axios.get('/api/admin/gettanggapan', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.daftartanggapan = response.data
            console.log(this.daftartanggapan)
        })
    },
    methods: {
        hapus(idt) {
            this.$swal('Apakah kamu yakin ingin menghapus?');
        },
        lihattanggapan(idt, ktg) {
            this.$router.push('/admin/tanggapan/' + idt + '/' + ktg)
        },
    }
}
</script>
