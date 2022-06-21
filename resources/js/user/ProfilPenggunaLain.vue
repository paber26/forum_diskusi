<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-2/3 flex flex-col justify-center">
        <div class="mt-4">
            <div class="bg-white w-full px-3 rounded-lg mb-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img :src="profil.gambar" class="h-36 w-36 rounded-full p-2" v-if="profil.gambar!=''">
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-36 w-36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="ml-2">
                            <div class="font-bold">{{ profil.nama }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 sm:col-span-4 lg:col-span-3 order-first">
                    <div class="bg-white w-full p-2 rounded-md mb-2">
                        <span class="font-semibold text-base italic">Status</span>
                        <div class="grid grid-cols-2 justify-center">
                            <div class="col-span-1 flex flex-col items-center">
                                <span class="text-2xl">{{ totaltanggapan }}</span>
                                <span class="text-sm text-gray-500">Tanggapan</span>
                            </div>
                            <div class="col-span-1 flex flex-col items-center">
                                <span class="text-2xl">{{ totalthread }}</span>
                                <span class="text-sm text-gray-500">Thread</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white w-full p-2 rounded-lg mb-3">
                        <div class="flex flex-col">
                            <span class="font-semibold text-base italic">Profil</span>
                            <div class="flex flex-col text-justify">
                                <div class="flex flex-col mb-3">
                                    <span>Deskripsi</span>
                                    <span class="ml-3 text-gray-600">{{ profil.deskripsi }}</span>
                                </div>
                                <div class="flex flex-col mb-3">
                                    <span>NIM</span>
                                    <span class="ml-3 text-gray-600">{{ profil.nim }}</span>
                                </div>
                                <div class="flex flex-col mb-3">
                                    <span>No WA</span>
                                    <span class="ml-3 text-gray-600">{{ profil.nowa }}</span>
                                </div>
                                <div class="flex flex-col mb-3">
                                    <span>Alamat Kos</span>
                                    <span class="ml-3 text-gray-600">{{ profil.alamat }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-8 lg:col-span-9">
                    <div class="bg-white p-1 rounded-lg mb-2.5">
                        <div class="grid grid-cols-2 justify-center items-center gap-3 mb-0.5 text-gray-700">
                            <button @click.prevent="isactive = 'tanggapan'" class="hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5" :class="(isactive == 'tanggapan') ? 'bg-blue-200':''">
                                <div class="font-semibold">Tanggapan</div>
                            </button>
                            <button @click.prevent="isactive = 'thread'" class="hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5" :class="(isactive == 'thread') ? 'bg-blue-200':''">
                                <div class="font-semibold">Thread</div>
                            </button>
                        </div>
                    </div>

                    <div v-if="isactive == 'tanggapan'">
                        <div class="bg-white w-full p-3 rounded-lg mb-2.5" v-for="tanggapan in daftartanggapan" :key="tanggapan.idtn">
                            <div class="flex items-center">
                                <div class="ml-2">
                                    <div class="text-xs italic">Menanggapi thread {{ tanggapan.namapemilik }} pada {{ tanggapan.date }}</div>
                                </div>
                            </div>
                            <a @click.prevent="tanggapi(tanggapan.idt)" class="flex items-baseline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                                <span class="font-bold text-lg mb-2 cursor-pointer" v-html="tanggapan.judul"></span>
                            </a>
                            <hr>
                            <span v-html="tanggapan.isi"></span>
                        </div>
                    </div>

                    <div v-if="isactive == 'thread'">
                        <div class="bg-white w-full px-3 pt-3 rounded-lg mb-3" v-for="thread in daftarthread" :key="thread.idt">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center">
                                    <img :src="thread.gambar" class="h-12 w-12 rounded-full" v-if="thread.gambar!=''">
                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="ml-2">
                                        <div class="font-semibold">{{ thread.nama }} <span class="text-xxs">({{ thread.nim }})</span></div>
                                        <div class="text-xs italic">Dibuat pada {{ thread.date }}</div>
                                    </div>
                                </div>
                                <span :class="thread.kategori == 'Pertanyaan' ? 'bg-red-600': thread.kategori=='Informasi' ? 'bg-green-600' : 'bg-indigo-600'" class="inline-flex items-center px-2 py-1 text-xs font-bold leading-none text-white rounded">{{ thread.kategori }}</span>
                            </div>
                            <div class="flex m-1">
                                <div class="flex flex-col items-center ml-2">
                                    <button @click.prevent="dukung(thread.idt, 'naik')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(thread.pilihan == 'naik') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                        </svg>
                                    </button>
                                    <span>{{ thread.tdukungan }}</span>
                                    <button @click.prevent="dukung(thread.idt, 'turun')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(thread.pilihan == 'turun') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex flex-col ml-3.5">
                                    <a @click.prevent="tanggapi(thread.idt)" class="font-bold text-lg mb-2 cursor-pointer" v-html="thread.judul"></a>
                                    <span v-html="thread.isi"></span>
                                </div>
                            </div>
                            <hr>
                            <div class="flex justify-between py-1.5">
                                <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-3" v-if="thread.tmenanggapi == 0">Belum ada tanggapan</button>
                                <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-3" v-else>Lihat {{ thread.tmenanggapi }} jawaban</button>
                                <span class="font-semibold">Laporkan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user', 'nim'],
    data() {
        return {
            profil : '',
            daftartanggapan: '',
            daftarthread: '',
            totaltanggapan: '-',
            totalthread: '-',
            isactive: 'tanggapan'
        }
    },
    mounted() {
        axios.get('/api/user/getprofil/' + this.nim, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.profil = response.data
        })
        axios.get('/api/user/gettanggapanprofil/' + this.nim, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.totaltanggapan = response.data[0]
            this.daftartanggapan = response.data[1]
        })
        this.getthreadprofil()
    },
    methods: {
        getthreadprofil() {
            axios.get('/api/user/getthreadprofil/' + this.nim, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.totalthread = response.data[0]
                this.daftarthread = response.data[1]
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
    }
}
</script>
