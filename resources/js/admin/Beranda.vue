<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-4/5 flex flex-col justify-center">
        <div class="bg-white p-1 rounded-lg mt-4">
            <div class="grid grid-cols-2 justify-center items-center gap-3 mb-0.5 text-gray-700">
                <button @click.prevent="lihat('thread')" class="hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5" :class="(isactive == 'thread') ? 'bg-blue-200':''">
                    <div class="font-semibold">Thread</div>
                </button>
                <button @click.prevent="isactive = 'tanggapan'" class="hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5" :class="(isactive == 'tanggapan') ? 'bg-blue-200':''">
                    <div class="font-semibold">Tanggapan</div>
                </button>
            </div>
        </div>
        <div class="mt-4" :class="(isactive == 'thread') ? '':'hidden'">
            <span class="font-bold text-lg mt-4">Thread Terbaru</span>
            <div class="bg-white w-full px-2 pt-3 rounded-lg mb-3" v-for="thread in daftarthread" :key="thread.idt">
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
                        <!-- <a @click.prevent="tanggapi(thread.idt)" class="font-bold text-lg mb-2 cursor-pointer" v-html="thread.judul"></a> -->
                        <span v-html="thread.isi"></span>
                    </div>
                </div>
                <hr>
                <div class="flex justify-between py-1.5">
                    <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-3" v-if="thread.tmenanggapi == 0">Belum ada tanggapan</button>
                    <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-3" v-else>Lihat {{ thread.tmenanggapi }} jawaban</button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
            </div>
            <!-- <span class="font-semibold italic flex justify-end -mt-2">Lihat Selengkapnya</span> -->
        </div>

        <div class="my-4" :class="(isactive == 'tanggapan') ? '':'hidden'">
            <span class="font-bold text-lg mt-4">Tanggapan Terbaru</span>
            <div class="bg-white w-full p-3 rounded-lg mb-2.5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">221810213@stis.ac.id</div>
                        <div class="text-xs italic">Menanggapi pada 04-06-2020 08:23</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                    <span class="ml-2 text-lg font-bold">Apakah orang gila yang telah sembuh, sadar dan ingat bahwa dulu dirinya pernah gila?</span>
                </div>
                <span class="">Sadar, meskipun tidak sepenuhnya ingat.
                    Teman saya pernah jadi pasien di salah satu RSJ di Solo. Sekitar tahun 2009. Anaknya gaul, cakep, termasuk dari keluarga terpandang meskipun masuk kategori anak nakal di sekolah. Biasa lah, anak umur 16 tahun lg nakal2nya.</span>
            </div>
            <div class="bg-white w-full p-3 rounded-lg mb-2.5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">221810213@stis.ac.id</div>
                        <div class="text-xs italic">Menanggapi pada 04-06-2020 08:23</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                    <span class="ml-2 text-lg font-bold">Apakah orang gila yang telah sembuh, sadar dan ingat bahwa dulu dirinya pernah gila?</span>
                </div>
                <span class="">Sadar, meskipun tidak sepenuhnya ingat.
                    Teman saya pernah jadi pasien di salah satu RSJ di Solo. Sekitar tahun 2009. Anaknya gaul, cakep, termasuk dari keluarga terpandang meskipun masuk kategori anak nakal di sekolah. Biasa lah, anak umur 16 tahun lg nakal2nya.</span>
            </div>
            <div class="bg-white w-full p-3 rounded-lg mb-2.5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">221810213@stis.ac.id</div>
                        <div class="text-xs italic">Menanggapi pada 04-06-2020 08:23</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                    <span class="ml-2 text-lg font-bold">Apakah orang gila yang telah sembuh, sadar dan ingat bahwa dulu dirinya pernah gila?</span>
                </div>
                <span class="">Sadar, meskipun tidak sepenuhnya ingat.
                    Teman saya pernah jadi pasien di salah satu RSJ di Solo. Sekitar tahun 2009. Anaknya gaul, cakep, termasuk dari keluarga terpandang meskipun masuk kategori anak nakal di sekolah. Biasa lah, anak umur 16 tahun lg nakal2nya.</span>
            </div>
            <span class="font-semibold italic flex justify-end -mt-2">Lihat Selengkapnya</span>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            daftarthread: '',
            isactive: 'thread'
        }
    },
    mounted() {
        this.getthread()
    },
    methods: {
        getthread() {
            axios.get('/api/admin/getthread', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.daftarthread = response.data
                console.log(this.daftarthread)
            })
        },
        gettanggapan() {
            axios.get('/api/admin/gettanggapan', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.totaltanggapan = response.data[0]
                this.daftartanggapan = response.data[1]
                console.log(this.daftartanggapan)
            })
        },
        lihat(ktg) {
            if (ktg == 'thread') {
                this.isactive = 'thread'
                this.getthread()
            } else if (ktg == 'tanggapan') {
                this.isactive = 'tanggapan'
                this.gettanggapan()
            }
        },
        tanggapi(idt) {
            this.$router.push('/user/tanggapi/' + idt)
        },
    }
}
</script>
