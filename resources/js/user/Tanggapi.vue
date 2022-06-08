<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <div class="mt-4">
            <span class="font-bold text-lg mt-4">Thread</span>
            <div class="bg-white w-full px-3 pt-3 rounded-lg">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">{{ thread.nim }}</div>
                        <div class="text-xs italic">Dibuat pada {{ thread.date }}</div>
                    </div>
                </div>
                <div class="flex m-1">
                    <div class="flex flex-col items-center ml-2">
                        <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span>{{ thread.tdukungan }}</span>
                        <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <span class="font-bold text-base" v-if="thread.tmenanggapi != 0">Tanggapan</span>
            <div class="bg-white w-full px-3 pt-3 rounded-lg mb-3" v-for="tanggapan in daftartanggapan" :key="tanggapan.idtn">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">{{ tanggapan.nim }}</div>
                        <div class="text-xs italic">Menanggapi pada {{ tanggapan.date }}</div>
                    </div>
                </div>
                <div class="flex m-1">
                    <div class="flex flex-col items-center ml-2">
                        <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span>{{ tanggapan.tdukungan }}</span>
                        <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <span class="ml-2" v-html="tanggapan.isi"></span>
                </div>
                <hr>
                <div class="flex justify-between py-1.5">
                    <button @click.prevent="tanggapi()" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-2"></button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
            </div>
            <div class="bg-birumateri w-full h-0.5 rounded-3xl my-1.5"></div>
        </div>

        <div class="mt-2">
            <span class="font-bold text-lg mt-2">Tambah Tanggapan</span>
            <div class="bg-white w-full py-3 rounded-lg">
                <div class="col-sm-12 mb-2">
                    <vue-editor v-model="fields.isi"></vue-editor>
                </div>
                <div class=" flex justify-between -mb-1 ">
                    <button @click.prevent="simpandraft()" class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-2 rounded-lg ml-3">
                        Simpan Draft
                    </button>
                    <button @click.prevent="tanggapi()" class="bg-green-500 hover:bg-green-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                        Tanggapi
                    </button>
                </div>
            </div>
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
        console.log(this.idt)
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
                console.log(response.data)
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
                console.log(response.data)
            })
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
                } else {
                    console.log(response.data)
                }
            })
            console.log(this.fields)
        }
    }
}
</script>
