<template>
<div class="flex flex-col justify-center">
    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="font-bold text-xl">Forum Tanya Jawab</div>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="w-11/12 mt-3">
            <div class="bg-gray-200 p-2 rounded-xl">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-2">
                        <div class="font-semibold">{{ detailsoal.username }}</div>
                        <div class="text-xs italic">Ditanyakan pada {{ detailsoal.date }}</div>
                    </div>
                </div>
                <div class="p-3">
                    <span v-html="detailsoal.pertanyaan"></span>
                    <hr class="my-2">
                    <div v-if="detailjawaban==0">
                        <span class="font-semibold italic">Belum ada jawaban</span>
                    </div>
                    <div v-else>
                        <span class="font-semibold">{{ detailjawaban.length }} jawaban</span>
                        <div class="mt-2">
                            <div v-for="jwb in detailjawaban" :key="jwb.id" class="mb-2">
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
                                        <button @click.prevent="dukungan(jwb.jfid, 'naik')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(jwb.pilihan == 'naik') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'hover:bg-gray-50 text-gray-700 border-2 border-birumateri'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                            </svg>
                                        </button>
                                        <span>{{ jwb.dukungan }}</span>
                                        <button @click.prevent="dukungan(jwb.jfid, 'turun')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(jwb.pilihan == 'turun') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'hover:bg-gray-50 text-gray-700 border-2 border-birumateri'">
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
            </div>
            <div class="bg-birumateri w-full h-0.5 rounded-3xl my-2.5"></div>
            <form @submit.prevent="checkForm" class="flex flex-col">
                <div class="font-semibold">Tambahkan Jawaban</div>
                <div class="flex flex-col border-2 border-birumateri rounded-xl">
                    <textarea class="p-3 rounded-xl outline-none" placeholder="Masukkan pertanyaan ..." v-model="fields.jawaban"></textarea>
                </div>
                <div class="mt-2 flex flex-col border-2 border-birumateri rounded-xl" v-if="fields.jawaban!=''">
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
</template>

<script>
export default {
    props: ['user', 'fid'],
    data() {
        return {
            detailsoal: '',
            detailjawaban: '',
            fields: {
                fid: this.fid,
                jawaban: ''
            }
        }
    },
    mounted() {
        this.getdetailsoalforum()
    },
    methods: {
        getdetailsoalforum() {
            axios.get('/api/getdetailsoalforum/' + this.fid, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                console.log(response.data)
                this.detailsoal = response.data[0]
                this.detailjawaban = response.data[1]
            })
        },
        dukungan(jfid, pilihan) {
            let detail = {
                'jfid': jfid,
                'pilihan': pilihan
            }
            console.log(detail)
            axios.post('/api/dukunganjawabanforum', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                console.log(response.data)
                this.getdetailsoalforum()
            })
        },
        checkForm: function () {
            if (this.fields.jawaban != '') {
                axios.post('/api/tambahjawabanforum', this.fields, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + this.user.api_token
                    },
                }).then((response) => {
                    if (response.data == 'Berhasil') {
                        this.fields.jawaban = ''
                        this.getdetailsoalforum()
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
