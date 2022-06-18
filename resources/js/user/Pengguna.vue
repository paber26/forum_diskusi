<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-2/3 flex flex-col justify-center"><span class="font-bold text-2xl mt-4 mb-3">Semua Pengguna</span>
        <div class="relative overflow-x-auto">
            <table class="w-full text-left">
                <thead class="text-base text-gray-700 uppercase bg-blue-300">
                    <tr class="text-center divide-x divide-gray-400">
                        <th class="px-3 py-2">No</th>
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
        }
    },
    mounted() {
        axios.get('/api/user/getdaftarpengguna', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.dpengguna = response.data
            console.log(response.data)
        })
        this.getthreadprofil()
    },
    methods: {
        getthreadprofil() {
            axios.get('/api/user/getthreadprofil', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.totalthread = response.data[0]
                this.daftarthread = response.data[1]
                console.log(this.daftarthread)
            })
        },
        tanggapi(idt) {
            this.$router.push('/user/tanggapi/' + idt)
        },
        dukung(idt, pilihan) {
            let detail = {
                'idt': idt,
                'pilihan': pilihan
            }
            axios.post('/api/user/dukung/thread', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(
                this.getthreadprofil()
            )
        },
        lihatprofil(nim){
            this.$router.push('/user/profil/' + nim)
        }
    }
}
</script>
