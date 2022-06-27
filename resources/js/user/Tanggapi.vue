<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-2/3 lg:w-1/2 flex flex-col justify-center">
        <div class="mt-4">
            <span class="font-bold text-lg mt-4">Thread</span>
            <div class="bg-white w-full px-3 pt-3 rounded-lg">
                <div class="flex justify-between items-start">
                    <div class="flex items-center">
                        <img :src="thread.gambar" class="h-12 w-12 rounded-full" v-if="thread.gambar!=''">
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="ml-2">
                            <button @click.prevent="lihatprofil(thread.nim)" class="font-semibold">{{ thread.nama }} <span class="text-xxs">({{ thread.nim }})</span></button>
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
                    <span class="font-semibold ml-2" v-if="thread.tmenanggapi == 0">Belum ada tanggapan </span>
                    <span class="font-semibold ml-2" v-else>{{ thread.tmenanggapi }} tanggapan</span>
                    <button v-if="thread.nim != user.nim" @click.prevent="laporthread(thread.idt)" class="relative flex items-center px-3">
                        <span class="font-semibold">Laporkan</span>
                    </button>
                    <button v-else @click.prevent="editthread(thread.idt)" class="flex items-center bg-red-500 hover:bg-red-700 text-white text-xs px-2 py-1">
                        <span class="font-semibold">Edit</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <span class="font-bold text-base" v-if="thread.tmenanggapi != 0">Tanggapan</span>
            <div class="bg-white w-full px-3 pt-3 rounded-lg mb-3" v-for="tanggapan in daftartanggapan" :key="tanggapan.idtn">
                <div class="flex items-center">
                    <img :src="tanggapan.gambar" class="h-12 w-12 rounded-full" v-if="tanggapan.gambar!=''">
                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-2">
                        <button @click.prevent="lihatprofil(tanggapan.nim)" class="font-semibold">{{ tanggapan.nama }} <span class="text-xxs">({{ tanggapan.nim }})</span></button>
                        <div class="text-xs italic">Menanggapi pada {{ tanggapan.date }}</div>
                    </div>
                </div>
                <div class="flex m-1">
                    <div class="flex flex-col items-center ml-2">
                        <button @click.prevent="dukungtanggapan(tanggapan.idtn, 'naik')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(tanggapan.pilihan == 'naik') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span>{{ tanggapan.tdukungan }}</span>
                        <button @click.prevent="dukungtanggapan(tanggapan.idtn, 'turun')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(tanggapan.pilihan == 'turun') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <span class="ml-2" v-html="tanggapan.isi"></span>
                </div>
                <hr>
                <div class="flex justify-end py-1.5">
                    <button v-if="tanggapan.nim != user.nim" @click.prevent="laportanggapan(tanggapan.idtn)" class="relative flex items-center px-3">
                        <span class="font-semibold">Laporkan</span>
                    </button>
                    <button v-else @click.prevent="edittanggapan(thread.idt, tanggapan.idtn)" class="flex items-center bg-red-500 hover:bg-red-700 text-white text-xs px-2 py-1">
                        <span class="font-semibold">Edit</span>
                    </button>
                </div>
            </div>
            <div class="bg-birumateri w-full h-0.5 rounded-3xl my-1.5"></div>
        </div>

        <div v-if="thread.stanggapan == 'aktif'" class="mt-2">
            <span class="font-bold text-lg mt-2">Tambah Tanggapan</span>
            <div class="bg-white w-full py-3 rounded-lg">
                <div class="col-sm-12 mb-2">
                    <vue-editor v-model="fields.isi"></vue-editor>
                </div>
                <div class=" flex justify-end -mb-1 ">
                    <button @click.prevent="tanggapi()" class="bg-green-500 hover:bg-green-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                        Tanggapi
                    </button>
                </div>
            </div>
        </div>
        <div v-else class="mt-2">
            <span class="font-bold text-lg mt-2 italic">Tanggapan telah nonaktifkan</span>
        </div>
        <div class="mb-5"></div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user', 'idt'],
    data() {
        return {
            thread: '',
            daftartanggapan: '',
            fields: {
                idt: this.idt,
                isi: ''
            }
        }
    },
    mounted() {
        this.getthread()
        this.gettanggapan()
    },
    methods: {
        getthread() {
            axios.get('/api/user/getthread/' + this.idt, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.thread = response.data
                console.log(this.thread)
            })
        },
        gettanggapan() {
            axios.get('/api/user/gettanggapan/' + this.idt, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.daftartanggapan = response.data
            })
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
                this.getthread()
            )
        },
        dukungtanggapan(idtn, pilihan) {
            let detail = {
                'idtn': idtn,
                'pilihan': pilihan
            }
            axios.post('/api/user/dukung/tanggapan', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(
                this.gettanggapan()
            )
        },
        tanggapi() {
            if (this.fields.isi == '') {
                this.$swal('Masukkan Isi Tanggaapan')
                return
            }
            axios.post('/api/user/tanggapi', this.fields, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(response => {
                if (response.data == 'Berhasil') {
                    this.$swal('Berhasil Menanggapi')
                    this.getthread()
                    this.gettanggapan()
                    this.fields.isi = ''
                } else {}
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
        laportanggapan(idtn) {
            this.$swal({
                text: 'Masukkan Alasan Melaporkan Tanggapan Ini',
                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (value != null) {
                        let detail = {
                            'idtn': idtn,
                            'alasan': value
                        }
                        axios.post('/api/user/laportanggapan', detail, {
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
        lihatprofil(nim) {
            this.$router.push('/user/profil/' + nim)
        },
        editthread(idt) {
            this.$router.push('/user/edit_thread/' + idt)
        },
        edittanggapan(idt, idtn){
            this.$router.push('/user/edit_tanggapan/' + idt + '/' + idtn)
        },
    }
}
</script>
