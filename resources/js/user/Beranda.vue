<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-3/4 mt-3 sm:mt-0 flex flex-col justify-center">
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
                    <button @click.prevent="filter()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 w-full">
                        Filter
                    </button>
                </div>
                <div class="bg-white w-full p-2 rounded-md mt-4">
                    <label class="font-medium text-sm">Teraktif (Thread)</label>
                    <div class="flex flex-col items-center mt-3" v-for="top in topuserthread" :key="top.idt">
                        <img :src="top.gambar" class="h-12 w-12 rounded-full">
                        <div class="ml-2">
                            <button @click.prevent="lihatprofil(top.nim)" class="font-semibold hover:text-gray-500 text-left">{{ top.nama }}<br> </button>
                        </div>
                        <div class="text-xxs flex">
                            <div>({{ top.nim }})</div>
                            <div class="ml-2">({{ top.jumlah }} Thread)</div>
                        </div>
                        <hr class="w-full">
                    </div>
                </div>
                <div class="bg-white w-full p-2 rounded-md mt-2">
                    <label class="font-medium text-sm">Teraktif (Tanggapan)</label>
                    <div class="flex flex-col items-center mt-3" v-for="top in topusertanggapan" :key="top.idt">
                        <img :src="top.gambar" class="h-12 w-12 rounded-full">
                        <div class="ml-2">
                            <button @click.prevent="lihatprofil(top.nim)" class="font-semibold hover:text-gray-500 text-left">{{ top.nama }}<br> </button>
                        </div>
                        <div class="text-xxs flex">
                            <div>({{ top.nim }})</div>
                            <div class="ml-2">({{ top.jumlah }} Tanggapan)</div>
                        </div>
                        <hr class="w-full">
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-8 lg:col-span-9">
                <div class="flex justify-between items-center mb-1">
                    <span class="font-bold text-xl">Beranda</span>

                    <form class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 w-96 flex justify-between">
                        <input v-model="keywords" class="bg-white w-72 p-1 border-none" placeholder="Masukkan kata yang ingin dicari">
                        <button @click.prevent="cari()" class="bg-blue-700 hover:bg-blue-800 focus:ring-4 px-4 py-2 text-white">Cari</button>
                    </form>

                </div>
                <div class="font-semibold italic mt-3" v-if="daftarthread == '' && iscari == false">
                    <span>Thread Masih Kosong</span>
                </div>
                <div class="font-semibold italic mt-3" v-if="daftarthread == '' && iscari == true">
                    <span>Hasil {{ keyword }} tidak ditemukan</span>
                </div>
                <div v-else class="bg-white w-full px-3 pt-3 rounded-lg mb-3" v-for="thread in daftarthread" :key="thread.idt">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center">
                            <img :src="thread.gambar" class="h-12 w-12 rounded-full" v-if="thread.gambar != ''">
                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="ml-2">
                                <button @click.prevent="lihatprofil(thread.nim)" class="font-semibold hover:text-gray-500">{{ thread.nama }} <span class="text-xxs">({{ thread.nim }})</span></button>
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
                            <a @click.prevent="tanggapi(thread.idt)" class="inline-block font-bold text-lg mb-2 cursor-pointer" v-html="thread.judul"></a>
                            <span v-html="thread.isi"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between py-1.5">
                        <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-2" v-if="thread.tmenanggapi == 0">Belum ada tanggapan</button>
                        <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-2" v-else>Lihat {{ thread.tmenanggapi }} tanggapan</button>
                        <div class="flex justify-center">
                            <button v-if="thread.nim != user.nim" @click.prevent="laporthread(thread.idt)" class="relative flex items-center px-3">
                                <span class="font-semibold">Laporkan</span>
                            </button>
                            <button v-else @click.prevent="editthread(thread.idt)" class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-2 py-1">
                                <span class="font-semibold">Edit</span>
                            </button>
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
            topuserthread: '',
            topusertanggapan: '',
            fields: {
                urutan: 'Terbaru',
                kategori: 'Semua'
            },
            keywords: '',
            keyword: '',
            iscari: false,
        }
    },
    mounted() {
        this.filter()
        axios.get('/api/user/gettopuser', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.topuserthread = response.data[0]
            this.topusertanggapan = response.data[1]
        })
    },
    methods: {
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
                this.filter()
            })
        },
        laporthread(idt) {
            this.$swal({
                text: 'Masukkan Alasan Melaporkan Thread Ini',
                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (value != null) {
                        let detail = {
                            'idt': idt,
                            'alasan': value
                        }
                        axios.post('/api/user/laporthread', detail, {
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': 'Bearer ' + this.user.api_token
                            },
                        }).then(response => {
                            if (response.data == 'Berhasil') {
                                this.$swal('Berhasil melaporkan')
                            } else if (response.data == 'Sudah') {
                                this.$swal('Kamu sudah melaporkan')
                            }
                        })
                    }
                }
            })
        },
        filter() {
            this.iscari = false
            let detail = {
                'urutan': this.fields.urutan,
                'kategori': this.fields.kategori
            }
            axios.post('/api/user/getthreadfilter', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(response => {
                this.daftarthread = response.data
            })
        },
        lihatprofil(nim) {
            this.$router.push('/user/profil/' + nim)
        },
        editthread(idt) {
            this.$router.push('/user/edit_thread/' + idt)
        },
        cari() {
            if(this.keywords == '' && this.iscari == false){
                this.$swal('Masukkan kata kunci pencarian')
                return
            }else if(this.keywords == '' && this.iscari == true){
                this.iscari = false
                this.filter()
                return
            }
            this.iscari = true
            this.keyword = this.keywords
            axios.post('/api/user/getpencarian', this.keyword, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(response => {
                if(response.data == 0){
                    this.daftarthread = ''
                }else{
                    this.daftarthread = response.data
                }
            })
        }
    }
}
</script>
