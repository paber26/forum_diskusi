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
                <div v-if="arsipsoal!=0">
                    <div class="bg-white mt-2 p-3 rounded-2xl" v-for="soal in arsipsoal" :key="soal.id">
                        <div>
                            <div class="font-bold">Nomor {{ soal.nomor }}</div>
                            <span v-html="soal.pertanyaan"></span>
                        </div>
                        <div class="bg-birumateri w-full h-0.5 rounded-3xl my-1.5"></div>
                        <template v-if="soal.jlhjawaban == 0">
                            <div v-if="soal.jlhjawaban==0" class="font-semibold italic">Belum ada jawaban</div>
                            <button @click.prevent="jawab(soal.asid)" class="font-semibold text-blue-500 italic">Tambahkan Jawaban</button>
                        </template>
                        <template v-else>
                            <div class="font-semibold italic">{{ soal.jlhjawaban }} jawaban</div>
                            <button @click.prevent="jawab(soal.asid)" class="font-semibold text-blue-500 italic">Lihat Jawaban</button>
                        </template>
                    </div>
                </div>
                <div v-else>
                    <span class="font-semibold italic">Arsip soal masih kosong</span>
                </div>
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
    props: ['user', 'prodi', 'mid', 'dasid'],
    data() {
        return {
            namaprodi: '',
            daftararsipsoal: '',
            arsipsoal: '',
            namasoal: '',
            namamatkul: ''
        }
    },
    mounted() {
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
        axios.get('/api/getarsipsoal/' + this.dasid, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            console.log(response.data)
            this.arsipsoal = response.data
            console.log(this.arsipsoal)
        })
    },
    methods: {
        ke(mid) {
            window.location.href = window.location.origin + "/daftararsipsoal/" + this.prodi;
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
        jawab(asid) {
            this.$router.push({
                path: '/arsipsoal/' + this.prodi + '/' + this.mid + '/' + this.dasid + '/' + asid
            })
        }
    }
}
</script>
