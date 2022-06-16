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
                        <td class="p-3 font-medium text-gray-900 text-center" v-html="daftarakun[index-1].is_admin ? 'Admin' : 'Pengguna'"></td>
                        <!-- <td class="p-3">
                            <div class="flex justify-center">
                                <button @click.prevent="gantiakses($daftarakun[index-1].nim)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
                                    <span class="text-sm">Ganti Akses</span>
                                </button>
                            </div>
                        </td> -->
                        <td class="p-3">{{ expand[index] }}{{ expand[index] }} ayo {{ expand[index] }}</td>
                        <h1>{{ expand[index] }}</h1>

                        <td class="p-3">
                            <!-- <select class="text-sm rounded-lg bg-green-500 text-white font-bold p-1.5">
                                <option selected>Ubah Akes</option>
                                <option value="Admin" @select="gantiakses($daftarakun[index-1].nim, 'akses')">Admin</option>
                                <option value="Pengguna" @select="gantiakses($daftarakun[index-1].nim, 'pengguna')">Pengguna</option>
                            </select> -->
                            <!-- <div class="dropdown">
                                <label tabindex="0" class="btn m-1">Click</label>
                                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                    <li><a>Item 1</a></li>
                                    <li><a>Item 2</a></li>
                                </ul>
                            </div> -->
                            <!-- <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> -->
                            <!-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path> -->
                            <!-- </svg></button> -->
                            <!-- Dropdown menu -->
                            <!-- <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                    </li>
                                </ul>
                            </div> -->
                            <button @click.prevent="ekspand(expand[index])" @blur="expand[index] = false" class="relative flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hover:text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                            <h1>{{ expand[index] }}</h1>
                            <div v-show="expand[index]" class="origin-top-right absolute bottom-6 right-0 w-32 bg-white rounded-lg border">
                                <a class="block hover:bg-gray-200 px-4 py-1 font-medium text-gray-800 text-center cursor-pointer" @mousedown.prevent="laporthread(thread.idt)">Laporkan</a>
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
import { mapGetters } from 'vuex'

export default {
    props: ['user'],
    data() {
        return {
            daftarakun: '',
            daftartanggapan: '',
            isactive: 'thread',
        }
    },
    mounted() {
        axios.get('/api/admin/getakun', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.daftarakun = response.data
            console.log(this.daftarakun)

            this.expand.push('false');
            this.expand.push('false');
            this.expand.push('false');
            this.expand.push('false');
            this.expand.push('false');
            console.log(this.expand)
        })

    },
    computed: {
        ...mapGetters({
            expand: [],
        })
    },
    methods: {
        ekspand(index) {
            this.expand[index] = !this.expand[index]
            console.log(this.expand[index])
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
        gantiakses(nim, akses) {
            console.log(nim)
            console.log(akses)
            // axios.get('/api/admin/gantiakses/' + nim, {
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'Authorization': 'Bearer ' + this.user.api_token
            //     },
            // }).then((response) => {
            //     this.daftarakun = response.data
            //     console.log(this.daftarakun)
            // })
        }
    }
}
</script>
