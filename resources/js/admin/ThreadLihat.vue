<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-2/3 flex flex-col justify-center">
        <!-- <div class="w-5/6 sm:w-2/3 lg:w-1/2 flex flex-col justify-center"> -->
        <!-- <div class="w-11/12 grid grid-cols-3 gap-2 justify-center mt-4"> -->
        <div class="mt-4">
            <div class="flex justify-between">
                <span class="font-bold text-lg">Thread</span>
                <router-link to="/admin" class="font-bold text-base text-blue-600 underline">Beranda</router-link>
            </div>
            <div class="bg-white w-full px-3 pt-3 rounded-lg">
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
                <div class="flex m-1">
                    <div class="flex flex-col items-center ml-2">
                        <div class="flex items-center justify-center rounded-sm h-7 w-7 bg-gray-50 text-gray-700 border border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                            </svg>
                        </div>
                        <span>{{ thread.tdukungan }}</span>
                        <div class="flex items-center justify-center rounded-sm h-7 w-7 bg-gray-50 text-gray-700 border border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
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
            <span class="font-bold text-base mb-3" v-if="thread.tmenanggapi != 0">Tanggapan</span>
            <div class="bg-white w-full px-3 pt-3 rounded-lg mb-3" id="yes1" v-for="tanggapan in daftartanggapan" :key="tanggapan.idtn">
                <div class="flex items-center">
                    <img :src="tanggapan.gambar" class="h-12 w-12 rounded-full" v-if="tanggapan.gambar!=''">
                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">{{ tanggapan.nim }}</div>
                        <div class="text-xs italic">Menanggapi pada {{ tanggapan.date }}</div>
                    </div>
                </div>
                <div class="flex m-1">
                    <div class="flex flex-col items-center ml-2">
                        <div class="flex items-center justify-center rounded-sm h-7 w-7 bg-gray-50 text-gray-700 border border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                            </svg>
                        </div>
                        <span>{{ tanggapan.tdukungan }}</span>
                        <div class="flex items-center justify-center rounded-sm h-7 w-7 bg-gray-50 text-gray-700 border border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <span class="ml-2" v-html="tanggapan.isi"></span>
                </div>
                <hr>
                <div class="flex justify-end py-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="mb-12"></div>
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
        axios.get('/api/admin/getthread/' + this.idt, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.thread = response.data
            console.log(response.data)
        })
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
}
</script>
