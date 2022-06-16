<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <span class="font-bold text-2xl mt-4 mb-3">Kelola Akun</span>
        <div class="relative overflow-x-auto">
            <div class="pb-3 flex justify-end">
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Akun">
                </div>
            </div>
            <table class="w-full text-left">
                <thead class="text-base text-gray-700 uppercase bg-blue-300">
                    <tr class="text-center divide-x divide-gray-400">
                        <th class="px-3 py-2">No</th>
                        <th class="px-3 py-2">Nama</th>
                        <th class="px-3 py-2">NIM</th>
                        <th class="px-3 py-2">Akses</th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b divide-x divide-gray-400" v-for="index in daftarakun.length" :key="index.idtn">
                        <td class="p-3 font-medium text-gray-900 text-center">{{ index }}</td>
                        <td class="p-3 font-medium text-gray-900">{{ daftarakun[index-1].nama }}</td>
                        <td class="p-3 font-medium text-gray-900 text-center">{{ daftarakun[index-1].nim }}</td>
                        <td class="p-3 font-medium text-gray-900 text-center" v-html="daftarakun[index-1].is_admin ? 'Admin' : 'Anggota'"></td>
                        <td class="p-3">
                            <div class="flex justify-center">
                                <button @click.prevent="gantiakses(daftarakun[index-1].nim, daftarakun[index-1].nama)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
                                    <span class="text-sm">Ganti Akses</span>
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
            daftarakun: '',
            daftartanggapan: '',
            expand: [],
            isactive: 'thread',
        }
    },
    mounted() {
        this.getakun()

    },
    methods: {
        getakun() {
            axios.get('/api/admin/getakun', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.daftarakun = response.data
            })
        },
        gettanggapan() {
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
        hapus_tanggapan(idt, idtn) {
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
                    axios.delete('/api/admin/hapus_tanggapan/' + idt + '/' + idtn, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + this.user.api_token
                        },
                    }).then(response => {
                        if (response.data == 'Berhasil') {
                            this.$swal('Berhasil menghapus')
                            this.gettanggapan()
                        }
                    })
                }
            })
        },
        gantiakses(nim, nama) {
            const {
                value: akses
            } = this.$swal({
                title: 'Pilih Akses Akun',
                text: nama + ' (' + nim + ')',
                input: 'select',
                inputOptions: {
                    '1': 'Admin',
                    '0': 'Anggota'
                },
                inputPlaceholder: 'Pilih akses akun',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (value != null) {
                        axios.get('/api/admin/gantiakses/' + nim + '/' + value, {
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': 'Bearer ' + this.user.api_token
                            },
                        }).then((response) => {
                            this.getakun()
                            console.log(response.data)
                            // this.daftartanggapan = response.data
                            // console.log(this.daftartanggapan)
                        })
                    }
                    if (value === 'admin') {
                        console.log(value)
                    } else if (value === 'anggota') {
                        console.log(value)
                    }

                    console.log('Selesai')
                }
            })
        }
    }
}
</script>
