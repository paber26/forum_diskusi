<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-3/4 flex flex-col justify-center">
        <div class="grid grid-cols-12 gap-3 mt-3">
            <div class="col-span-12 sm:col-span-4 lg:col-span-3 mt-4">
                <div class="bg-white w-full p-2 rounded-md mb-2">
                    <label class="font-medium text-sm">Urut Berdasarkan</label>
                    <select v-model="fields.urutan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <option value="Terbaru" selected>Terbaru</option>
                        <option value="Terlama">Terlama</option>
                        <option value="Populer">Populer</option>
                    </select>
                </div>
                <div class="bg-white w-full p-2 rounded-md mb-2">
                    <label class="font-medium text-sm">Pilih Kategori</label>
                    <select v-model="fields.kategori" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <option value="Semua" selected>Semua Kategori</option>
                        <option value="Pertanyaan">Pertanyaan</option>
                        <option value="Informasi">Informasi Statistik</option>
                        <option value="Ulasan">Ulasan Jurnal/Buku/Sumber lainnya</option>
                    </select>
                </div>
                <div class="bg-white w-full p-2 rounded-md mb-2">
                    <button @click.prevent="cari()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 w-full">
                        Cari
                    </button>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-8 lg:col-span-9">
                <span class="font-bold text-xl mb-2">Beranda</span>
                <div class="bg-white w-full px-3 pt-3 rounded-lg mb-3" v-for="thread in daftarthread" :key="thread.idt">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                            <span class="font-bold text-lg mb-2" v-html="thread.judul"></span>
                            <span v-html="thread.isi"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between py-1.5">
                        <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-2" v-if="thread.tmenanggapi == 0">Belum ada tanggapan</button>
                        <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-2" v-else>Lihat {{ thread.tmenanggapi }} tanggapan</button>
                        <div class="relative">
                            <button @click="isOptionsExpanded = !isOptionsExpanded" @blur="isOptionsExpanded = false" class="relative flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hover:text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                            <div v-show="isOptionsExpanded" class="origin-top-right absolute bottom-6 right-0 w-32 bg-white rounded-lg border">
                                <a class="block hover:bg-gray-200 px-4 py-1 font-medium text-gray-800 text-center cursor-pointer" @mousedown.prevent="laporthread(thread.idt)">Laporkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5"></div>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            daftarthread: '',
            isOptionsExpanded: false,
            fields: {
                urutan: 'Terbaru',
                kategori: 'Semua'
            }
        }
    },
    mounted() {
        this.cari()
    },
    methods: {
        getthread() {
            axios.get('/api/user/getthread', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.daftarthread = response.data
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
            }).then(response => {
                console.log(response.data)
                this.cari()
            })
        },
        laporthread(idt) {
            console.log(idt)
            let detail = {
                'idt': idt
            }

            axios.post('/api/user/laporthread', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(response => {
                console.log(response.data)
                if (response.data == 'Berhasil') {
                    this.$swal('Berhasil melaporkan')
                } else if (response.data == 'Sudah') {
                    this.$swal('Kamu sudah melaporkan')
                }
            })
        },
        cari() {
            let detail = {
                'urutan': this.fields.urutan,
                'kategori': this.fields.kategori
            }
            console.log(detail)
            axios.post('/api/user/getthreadfilter', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(response => {
                console.log(response.data)
                this.daftarthread = response.data
                console.log(this.daftarthread)
            })
        }
    }
}
</script>
