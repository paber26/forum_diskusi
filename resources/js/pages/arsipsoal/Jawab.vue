<template>
<div class="flex flex-col min-h-screen min-w-min">
    <div class="flex flex-row items-center p-2 bg-blue-300 min-w-100">
        <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-10 h-10 sm:w-12 sm:h-12">
        <div class="font-bold ml-2 text-white sm:hidden">
            <div class="text-2xl sm:text-xl">Materi</div>
            <div class="text-lg sm:text-base -mt-2">Polstat STIS</div>
        </div>
        <div class="font-bold ml-2 text-2xl text-white hidden sm:flex">
            SIRADIG
        </div>
    </div>
    <div class="flex-row bg-birumateri items-center hidden sm:flex">
        <div class="text-white font-semibold text-xl ml-3">{{ namaprodi }}</div>
        <div class="bg-white h-6 w-0.5 mx-2"></div>
        <div class="text-white font-semibold text-xl">{{ namamatkul }}</div>
    </div>
    <div class="flex flex-col bg-birumateri sm:hidden">
        <div class="text-white font-semibold text-xl ml-3 -mt-1">{{ namaprodi }}</div>
        <div class="text-white font-semibold text-xl ml-3 -mt-2">{{ namamatkul }}</div>
    </div>
    <div class="bg-gray-200 flex-1">
        <div class="grid grid-cols-12 gap-1">
            <div class="col-span-12 sm:col-span-3 lg:col-span-2 p-2 -mt-4 mb-4 sm:mt-16 order-last sm:order-first">
                <h1 class="font-bold text-xl text-blue-500">Tahun Pelajaran</h1>
                <div class="ml-0.5">
                    <div v-for="arsipsoal in daftararsipsoal" :key="arsipsoal.id">
                        <div class="flex flex-row items-center">
                            <div class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="font-bold">{{ arsipsoal.tahun }}</div>
                        </div>
                        <button @click.prevent="lihat(arsipsoal.dasid)" class="ml-3 flex flex-row items-center hover:text-blue-500">
                            <div class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="text-left">{{ arsipsoal.nama }}</div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-9 lg:col-span-10 m-2 p-2 rounded-2xl">
                <div class="grid grid-cols-2 mb-2">
                    <div class="col-span-2 sm:col-span-1 font-bold text-xl">{{ namasoal }}</div>
                    <div class="col-span-2 sm:col-span-1 flex justify-end items-center">
                        <a href="/" class="flex items-center hover:bg-yellow-200 rounded-md p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0    001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <div>Home</div>
                        </a>
                        <span>/</span>
                        <button @click.prevent="ke()" class="hover:bg-yellow-200 rounded-md p-1">
                            Arsip Soal {{ namaprodi }}
                        </button>
                    </div>
                </div>
                <div class="bg-birumateri w-full h-0.5 rounded-3xl"></div>
                <div class="bg-white mt-2 p-3 rounded-2xl">
                    <div>
                        <div class="font-bold">Nomor {{ detailsoal.nomor }}</div>
                        <span v-html="detailsoal.pertanyaan"></span>
                    </div>
                    <hr class="my-2">
                    <div v-if="detailjawaban==0">
                        <span class="font-semibold italic">Belum ada jawaban</span>
                    </div>
                    <div v-else>
                        <span class="font-semibold">{{ detailjawaban.length }} jawaban</span>
                        <div class="mt-2">
                            <div v-for="jwb in detailjawaban" :key="jwb.id" class="mb-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    <div class="ml-2">
                                        <div class="font-semibold">{{ jwb.email }}</div>
                                        <div class="text-xs italic">Dijawab pada {{ jwb.date }}</div>
                                    </div>
                                </div>
                                <div class="flex m-1">
                                    <div class="flex flex-col items-center">
                                        <button @click.prevent="dukungan(jwb.jasid, 'naik')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(jwb.pilihan == 'naik') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'hover:bg-gray-100 text-gray-700 border border-gray-200'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                            </svg>
                                        </button>
                                        <span>{{ jwb.dukungan }}</span>
                                        <button @click.prevent="dukungan(jwb.jasid, 'turun')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(jwb.pilihan == 'turun') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'hover:bg-gray-100 text-gray-700 border border-gray-200'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                    <span class="ml-2" v-html="jwb.jawaban"></span>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-birumateri w-full h-0.5 rounded-3xl my-2.5"></div>

                <form @submit.prevent="checkForm" class="flex flex-col">
                    <div class="font-semibold">Tambahkan Jawaban</div>
                    <div class="flex flex-col border-2 border-birumateri rounded-xl">
                        <textarea class="p-3 rounded-xl outline-none" placeholder="Masukkan pertanyaan ..." v-model="fields.jawaban"></textarea>
                    </div>
                    <div class="mt-2 bg-white flex flex-col border-2 border-birumateri rounded-xl" v-if="fields.jawaban!=''">
                        <div class="p-3 flex flex-col">
                            <span class="font-semibold mb-1.5">Tampilan Jawaban</span>
                            <span v-html="fields.jawaban"></span>
                        </div>
                    </div>
                    <button type="submit" class="bg-birumateri w-32 m-1 p-0.5 rounded-xl text-white text-center">Kirim Jawaban</button>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-blue-200 p-2 font-semibold">
        <div class="w-48">Politeknik Statistika STIS</div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user', 'prodi', 'mid', 'dasid', 'asid'],
    data() {
        return {
            namaprodi: '',
            daftararsipsoal: '',
            arsipsoal: [],
            namasoal: '',
            namamatkul: '',
            detailsoal: '',
            detailjawaban: '',
            fields: {
                asid: this.asid,
                jawaban: ''
            }
        }
    },
    mounted() {
        console.log(this.user)
        if (this.prodi == 'd3') {
            this.namaprodi = 'D-3 Statistika'
        } else if (this.prodi == 'd4st') {
            this.namaprodi = 'D-4 Statsistika'
        } else if (this.prodi == 'd4ks') {
            this.namaprodi = 'D-4 Komputasi Statistik'
        }
        axios.get('/api/getnamamatkul/' + this.mid, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.namamatkul = response.data
        })
        axios.get('/api/getdaftararsipsoal/' + this.mid, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.daftararsipsoal = response.data
        })
        axios.get('/api/getnamaarsipsoal/' + this.dasid, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.namasoal = response.data
        })
        this.getdetailsoal()
    },
    methods: {
        ke() {
            window.location.href = window.location.origin + "/daftararsipsoal/" + this.prodi;
        },
        getdetailsoal() {
            axios.get('/api/getdetailsoal/' + this.asid, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                console.log(response.data)
                this.detailsoal = response.data[0]
                this.detailjawaban = response.data[1]
                console.log(this.detailjawaban)
            })
        },
        lihat(dasid) {
            this.$router.push({
                path: '/arsipsoal/' + this.prodi + '/' + this.mid + '/' + dasid,
            }).catch(() => {});
            axios.get('/api/getnamaarsipsoal/' + dasid, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.namasoal = response.data
            })
            axios.get('/api/getarsipsoal/' + dasid, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.arsipsoal = response.data
            })
        },
        dukungan(jasid, pilihan) {
            let detail = {
                'jasid': jasid,
                'pilihan': pilihan
            }
            console.log(detail)
            axios.post('/api/dukungan', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                console.log(response.data)
                this.getdetailsoal()
            })
        },
        checkForm: function () {
            if (this.fields.jawaban != '') {
                axios.post('/api/tambahjawaban', this.fields, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + this.user.api_token
                    },
                }).then((response) => {
                    if (response.data == 'Berhasil') {
                        this.fields.jawaban = ''
                        this.getdetailsoal()
                        this.$swal('Berhasil menambahkan jawaban')
                    }
                })
            } else {
                this.$swal('Jawaban tidak boleh kosong')
            }
        },
    }
}
</script>
