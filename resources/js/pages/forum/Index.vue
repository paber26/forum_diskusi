<template>
<div class="flex flex-col justify-center">
    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="font-bold text-xl">Forum Tanya Jawab</div>
        </div>
    </div>

    <div class="flex w-full justify-center my-2.5">
        <div class="w-11/12 flex justify-end">
            <router-link to="/forum/tambah" class="flex items-center bg-green-500 hover:bg-green-400 px-3 py-1.5 rounded-md text-white outline-none hover:no-underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <div class="text-white font-bold text-sm">Tambah Pertanyaan</div>
            </router-link>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="w-11/12">
            <div class="bg-gray-400 rounded-t-lg p-1.5 font-bold text-base">Filter</div>
            <div class="bg-gray-200 rounded-b-lg p-2">
                <div class="flex flex-col">
                    <span class="font-semibold">Peminatan</span>
                    <select class="p-1 bg-white rounded-lg w-full" v-model="peminatan">
                        <option selected value="all">Semua Kategori</option>
                        <option value="se">Statistika Ekonomi</option>
                        <option value="sk">Statistika Sosial dan Kependudukan</option>
                        <option value="si">Sistem Informasi</option>
                        <option value="sd">Sains Data</option>
                        <option value="d3">DIII Statistika</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="w-11/12 mt-3">
            <div v-if="daftarforum==0" class="mb-6 bg-gray-200 p-2 rounded-md">
                <span class="italic font-semibold">Forum masih kosong . . .</span>
            </div>
            <div v-for="forum in daftarforum" :key="forum.id" class="mb-6 bg-gray-200 p-2 rounded-md">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">{{ forum.username }}</div>
                        <div class="text-xs italic">Dijawab pada {{ forum.date }}</div>
                    </div>
                </div>
                <div class="flex m-1">
                    <div class="flex flex-col items-center">
                        <button @click.prevent="dukungan(forum.fid, 'naik')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(forum.pilihan == 'naik') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span>{{ forum.dukungan }}</span>
                        <button @click.prevent="dukungan(forum.fid, 'turun')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(forum.pilihan == 'turun') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <span v-html="forum.pertanyaan" class="ml-3"></span>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            daftarforum: '',
            peminatan: 'all',
            show: false
        }
    },
    watch: {
        peminatan() {
            this.getdaftarforum()
        }
    },
    mounted() {
        this.getdaftarforum()
        console.log(this.peminatan)
    },
    methods: {
        getdaftarforum(peminatan) {
            axios.get('/api/getdaftarforum/' + this.peminatan, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                console.log(response.data)
                this.daftarforum = response.data
            })
        },
        saya() {
            console.log('Say')
        },
        dukungan(fid, pilihan) {
            let detail = {
                'fid': fid,
                'pilihan': pilihan
            }
            console.log(detail)
            axios.post('/api/dukunganforum', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                console.log(response.data)
                this.getdaftarforum()
            })
        }
    }
}
</script>
