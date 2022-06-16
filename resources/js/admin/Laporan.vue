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
                    <tr class="bg-white border-b divide-x divide-gray-400" v-for="index in laporanthread.length" :key="index.idlt">
                        <td class="p-3 text-center font-medium text-gray-900">{{ index }}</td>
                        <td class="p-3 text-center">
                            <span>{{ laporanthread[index-1].nama }}</span>
                            <div class="text-xxs">(NIM: {{ laporanthread[index-1].nim }})</div>
                        </td>
                        <td class="p-3">
                            <div class="text-xs italic">Dibuat pada {{ laporanthread[index-1].date }}</div>
                            <a @click.prevent="lihatthread(laporanthread[index-1].idt)" class="cursor-pointer font-semibold text-base">
                                {{ laporanthread[index-1].judul }}
                            </a>
                        </td>
                        <td class="p-3">
                            <div class=" flex flex-col">
                                <span class="mb-2">Jumlah: 1 orang</span>
                                <ol class="list-decimal ml-3">
                                    <li>Bernaldo Napitupulu</li>
                                </ol>
                            </div>
                        </td>
                        <td></td>
                        <td class="p-3 text-right">
                            <button @click.prevent="hapusthread(laporanthread[index-1].idt)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
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
                    <tr class="bg-white border-b divide-x divide-gray-400" v-for="index in laporantanggapan.length" :key="index.idltn">
                        <td class="p-3 text-center font-medium text-gray-900">{{ index }}</td>
                        <td class="p-3 text-center">
                            <span>{{ laporantanggapan[index-1].nama }}</span>
                            <div class="text-xxs">(NIM: {{ laporantanggapan[index-1].nim }})</div>
                        </td>
                        <td class="p-3">
                            <div class="text-xs italic">Menanggapi pada {{ laporantanggapan[index-1].date }}</div>
                            <a @click.prevent="lihatthread(laporantanggapan.idt)" class="flex items-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                                <span class="ml-2 text-lg font-bold">{{ laporantanggapan.judul }}</span>
                            </a>
                            <span v-html="laporantanggapan[index-1].isi"></span>
                        </td>
                        <td class="p-3">
                            <div class=" flex flex-col">
                                <span class="mb-2">Jumlah: 1 orang</span>
                                <ol class="list-decimal ml-3">
                                    <li>Bernaldo Napitupulu</li>
                                </ol>
                            </div>
                        </td>
                        <td></td>
                        <td class="p-3 text-right" >
                            <button @click.prevent="hapustanggapan(laporantanggapan[index-1].idtn)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
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
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            laporanthread: '',
            laporantanggapan: '',
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
                this.laporanthread = response.data
            })
        },
        getlaporan_tanggapan() {
            axios.get('/api/admin/getlaporan_tanggapan', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                console.log(response.data)
                this.laporantanggapan = response.data
            })
        },
        lihat(ktg) {
            if (ktg == 'thread') {
                this.isactive = 'thread'
            } else if (ktg == 'tanggapan') {
                this.isactive = 'tanggapan'
            }
        },
        hapustanggapan(idtn) {
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
                    axios.delete('/api/admin/hapus_tanggapan/' + idtn, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + this.user.api_token
                        },
                    }).then(response => {
                        console.log(response.data)
                        if (response.data == 'Berhasil') {
                            this.$swal('Berhasil menghapus')
                            this.getlaporan_tanggapan()
                        }
                    })
                }
            })
        },
        hapusthread(idt) {
            console.log(idt)
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
                    axios.delete('/api/admin/hapus_thread/' + idt, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + this.user.api_token
                        },
                    }).then(response => {
                        console.log(response.data)
                        if (response.data == 'Berhasil') {
                            this.$swal('Berhasil menghapus')
                            this.getthread()
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
