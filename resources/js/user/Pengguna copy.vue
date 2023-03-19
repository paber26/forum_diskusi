<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-2/3 flex flex-col justify-center"><span class="font-bold text-2xl mt-4 mb-3">Semua Pengguna</span>
        <div class="relative overflow-x-auto">
            <!-- <div class="bg-white w-full p-2 rounded-md mb-2">
                <label class="font-medium text-sm">Urut Berdasarkan</label>
                <select v-model="urutan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                    <option value="nama" selected>Nama</option>
                    <option value="thread">Thread Terbanyak</option>
                    <option value="tanggapan">Tanggapan Terbanyak</option>
                </select>
            </div> -->
            <div class="flex justify-between items-center">
                <div class="pb-3">
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" placeholder="Cari Akun" v-model="keyword">
                    </div>
                </div>
                <div class="p-1">
                    <button @click.prevent="urutkan()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-sm flex items-center">
                        <span class="text-sm">Urut Berdasarkan</span>
                    </button>
                </div>
            </div>
            <table class="w-full text-left">
                <thead class="text-base text-gray-700 uppercase bg-blue-300">
                    <tr class="text-center divide-x divide-gray-400">
                        <th class="px-3 py-2">No</th>
                        <th class="px-3 py-2">Gambar</th>
                        <th class="px-3 py-2">Nama Pengguna</th>
                        <th class="px-3 py-2">Jumlah Thread</th>
                        <th class="px-3 py-2">Jumlah Tanggapan</th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b divide-x divide-gray-400" v-for="(pengguna,index) in getdaftarpengguna" :key="index.id">
                        <td class="p-3 font-medium text-gray-900 text-center">{{ index+1 }}</td>
                        <td class="p-3">
                            <img :src="pengguna.gambar" class="rounded-full" alt="">
                        </td>
                        <td class="p-3">
                            <span>{{ pengguna.nama }}</span>
                            <div class="text-xxs">(NIM : {{ pengguna.nim }})</div>
                        </td>
                        <td class="p-3 text-center">{{ pengguna.tthread }}</td>
                        <td class="p-3 text-center">{{ pengguna.ttanggapan }}</td>
                        <td class="p-3">
                            <button @click.prevent="lihatprofil(pengguna.nim)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
                                Lihat Profil
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
            dpengguna: '',
            urutan: 'nama',
            keyword: '',
        }
    },
    mounted() {
        // this.getdaftarpengguna('nama')
    },
    computed:{
        getdaftarpengguna(val) {
            axios.get('/api/user/getdaftarpengguna/' + val, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                if (val == 'nama') this.dpengguna = response.data
                else if (val == 'thread') this.dpengguna = _.orderBy(this.dpengguna, 'tthread', 'desc')
                else if (val == 'tanggapan') this.dpengguna = _.orderBy(this.dpengguna, 'ttanggapan', 'desc')
            })
        },
    },
    methods: {
        // getdaftarpengguna(val) {
        //     axios.get('/api/user/getdaftarpengguna/' + val, {
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'Authorization': 'Bearer ' + this.user.api_token
        //         },
        //     }).then((response) => {
        //         if (val == 'nama') this.dpengguna = response.data
        //         else if (val == 'thread') this.dpengguna = _.orderBy(this.dpengguna, 'tthread', 'desc')
        //         else if (val == 'tanggapan') this.dpengguna = _.orderBy(this.dpengguna, 'ttanggapan', 'desc')
        //     })
        // },
        lihatprofil(nim) {
            this.$router.push('/user/profil/' + nim)
        },
        urutkan() {
            this.$swal({
                title: 'Urut Berdasarkan',
                input: 'select',
                inputOptions: {
                    'nama': 'Nama',
                    'thread': 'Thread Terbanyak',
                    'tanggapan': 'Tanggapan Terbanyak'
                },
                inputPlaceholder: 'Pilih Urutan',
                showCancelButton: true,
                inputValidator: (val) => {
                    if (val != null) {
                        this.getdaftarpengguna(val)
                    }
                }
            })
        }
    }
}
</script>
