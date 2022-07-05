<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <div class="bg-white p-1 rounded-lg mt-4">
            <div class="grid grid-cols-2 justify-center items-center gap-3 mb-0.5 text-gray-700">
                <button @click.prevent="lihat('thread')" class="hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5" :class="(isactive == 'thread') ? 'bg-blue-200':''">
                    <div class="font-semibold">Thread</div>
                </button>
                <button @click.prevent="isactive = 'tanggapan'" class="hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5" :class="(isactive == 'tanggapan') ? 'bg-blue-200':''">
                    <div class="font-semibold">Tanggapan</div>
                </button>
            </div>
        </div>
    </div>
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center" :class="(isactive == 'thread') ? '':'hidden'">
        <span class="font-bold text-2xl my-2">Kelola Laporan Thread</span>
        <div class="relative overflow-x-auto shadow-md" :class="(isactive == 'thread') ? '':'hidden'">
            <table class="w-full text-left">
                <thead class="text-base text-gray-700 uppercase bg-blue-300">
                    <tr class="text-center divide-x divide-gray-400">
                        <th class="px-3 py-2">No</th>
                        <th class="px-3 py-2">Pemilik Thread</th>
                        <th class="px-3 py-2">Thread</th>
                        <th class="px-3 py-2">Pelapor</th>
                        <th class="px-3 py-2">Alasan</th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="lt.length==0" class="font-italic font-semibold">Laporan Thread Kosong</tr>
                    <tr v-else class="bg-white border-b divide-x divide-gray-400" v-for="index in lt.length" :key="index.idlt">
                        <td class="p-3 text-center font-medium text-gray-900">{{ index }}</td>
                        <td class="p-3 text-center">
                            <span>{{ lt[index-1].namapemilik }}</span>
                            <div class="text-xxs">(NIM: {{ lt[index-1].nimpemilik }})</div>
                        </td>
                        <td class="p-3">
                            <div class="text-xs italic">Dibuat pada {{ lt[index-1].date }}</div>
                            <a @click.prevent="lihatthread(lt[index-1].idt)" class="cursor-pointer font-semibold text-base">
                                {{ lt[index-1].judul }}
                            </a>
                        </td>
                        <td class="p-3 text-center">
                            <span>{{ lt[index-1].namapelapor }}</span>
                            <div class="text-xxs">(NIM: {{ lt[index-1].nimpelapor }})</div>
                        </td>
                        <td>{{ lt[index-1].alasan }}</td>
                        <td class="p-3 text-right">
                            <button @click.prevent="hapus_laporanthread(lt[index-1].idt)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-sm">Hapus</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center" :class="(isactive == 'tanggapan') ? '':'hidden'">
        <span class="font-bold text-2xl my-2">Kelola Laporan Tanggapan</span>
        <div class="relative overflow-x-auto shadow-md">
            <table class="w-full text-left">
                <thead class="text-base text-gray-700 uppercase bg-blue-300">
                    <tr class="text-center divide-x divide-gray-400">
                        <th class="px-3 py-2">No</th>
                        <th class="px-3 py-2">Pemilik Thread</th>
                        <th class="px-3 py-2">Tanggapan</th>
                        <th class="px-3 py-2">Pelapor</th>
                        <th class="px-3 py-2">Alasan</th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="ltn.length==0" class="font-italic font-semibold">Laporan Tanggapan Kosong</tr>
                    <tr v-else class="bg-white border-b divide-x divide-gray-400" v-for="index in ltn.length" :key="index.idltn">
                        <td class="p-3 text-center font-medium text-gray-900">{{ index }}</td>
                        <td class="p-3 text-center">
                            <span class="font-semibold">{{ ltn[index-1].namapemilik }}</span>
                            <div class="text-xxs">(NIM: {{ ltn[index-1].nimpemilik }})</div>
                        </td>
                        <td class="p-3">
                            <div class="text-xs italic">Menanggapi pada {{ ltn[index-1].date }}</div>
                            <a @click.prevent="lihatthread(ltn.idt)" class="flex items-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                                <span class="ml-2 text-lg font-bold">{{ ltn[index-1].judul }}</span>
                            </a>
                            <hr>
                            <span v-html="ltn[index-1].isi"></span>
                        </td>
                        <td class="p-3">{{ ltn[index-1].namapelapor }}</td>
                        <td class="p-3">{{ ltn[index-1].alasan }}</td>
                        <td class="p-3 text-right">
                            <button @click.prevent="hapus_laporantanggapan(ltn[index-1].idt, ltn[index-1].idtn, ltn[index-1].idltn)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-sm">Hapus</span>
                            </button>
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
            lt: '',
            ltn: '',
            isactive: 'thread',
        }
    },
    mounted() {
        this.getlaporan_thread()
        this.getlaporan_tanggapan()
    },
    methods: {
        getlaporan_thread() {
            axios.get('/api/admin/getlaporan_thread', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.lt = response.data
            })
        },
        getlaporan_tanggapan() {
            axios.get('/api/admin/getlaporan_tanggapan', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.ltn = response.data
                console.log(response.data)
            })
        },
        lihat(ktg) {
            if (ktg == 'thread') {
                this.isactive = 'thread'
            } else if (ktg == 'tanggapan') {
                this.isactive = 'tanggapan'
            }
        },
        hapus_laporanthread(idt) {
            this.$swal({
                title: 'Apakah yakin untuk menghapus?',
                text: "Tindakan ini tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/admin/hapus_laporanthread/' + idt, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + this.user.api_token
                        },
                    }).then(response => {
                        if (response.data == 'Berhasil') {
                            this.$swal('Berhasil menghapus')
                            this.getlaporan_thread()
                        }
                    })
                }
            })
        },
        hapus_laporantanggapan(idt, idtn, idltn) {
            this.$swal({
                title: 'Apakah yakin untuk menghapus?',
                text: "Tindakan ini tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/admin/hapus_laporantanggapan/' + idt +'/' + idtn + '/' + idltn, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + this.user.api_token
                        },
                    }).then(response => {
                        if (response.data == 'Berhasil') {
                            this.$swal('Berhasil menghapus')
                            this.getlaporan_tanggapan()
                        }
                    })
                }
            })
        },
        lihatthread(idt) {
            this.$router.push('/admin/thread/' + idt)
        },
    }
}
</script>
