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
            <div class="flex justify-end mb-2">
                <button @click.prevent="urutkan()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-sm flex items-center">
                    <span class="text-sm">Urut Berdasarkan</span>
                </button>
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
                    <tr class="bg-white border-b divide-x divide-gray-400" v-for="index in dpengguna.length" :key="index.id">
                        <td class="p-3 font-medium text-gray-900 text-center">{{ index }}</td>
                        <td class="p-3">
                            <img :src="dpengguna[index-1].gambar" class="rounded-full" alt="">
                        </td>
                        <td class="p-3">
                            <span>{{ dpengguna[index-1].nama }}</span>
                            <div class="text-xxs">(NIM : {{ dpengguna[index-1].nim }})</div>
                        </td>
                        <td class="p-3 text-center">{{ dpengguna[index-1].tthread }}</td>
                        <td class="p-3 text-center">{{ dpengguna[index-1].ttanggapan }}</td>
                        <td class="p-3">
                            <button @click.prevent="lihatprofil(dpengguna[index-1].nim)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-full flex items-center">
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
            urutan: 'nama'
        }
    },
    mounted() {
        this.getdaftarpengguna('nama')
    },
    methods: {
        getdaftarpengguna(val) {
            axios.get('/api/user/getdaftarpengguna/' + val, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                if(val == 'nama') this.dpengguna = response.data
                else if(val == 'thread') this.dpengguna = _.orderBy(this.dpengguna, 'tthread', 'desc')
                else if(val == 'tanggapan') this.dpengguna = _.orderBy(this.dpengguna, 'ttanggapan', 'desc')
            })
        },
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
