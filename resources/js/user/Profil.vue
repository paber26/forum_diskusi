<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <div class="mt-4">
            <div class="bg-white w-full p-2 rounded-lg mb-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-36 w-36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <div class="ml-2">
                            <div class="font-semibold">{{ user.nama }}</div>
                            <div class="text-xs">0 Pengikut | 5 Mengikuti</div>
                        </div>
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded-full">
                        Edit Profil
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 sm:col-span-4 lg:col-span-3 order-last sm:order-first">
                    <div class="bg-white w-full p-2 rounded-md mb-2">
                        <span class="font-semibold text-base italic">Status</span>
                        <div class="grid grid-cols-2 justify-center">
                            <div class="col-span-1 flex flex-col items-center">
                                <span class="text-2xl">0</span>
                                <span class="text-sm text-gray-500">Tanggapan</span>
                            </div>
                            <div class="col-span-1 flex flex-col items-center">
                                <span class="text-2xl">0</span>
                                <span class="text-sm text-gray-500">Thread</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white w-full p-2 rounded-lg mb-3">
                        <div class="flex flex-col">
                            <span class="font-semibold text-base italic">Profil</span>
                            <div class="flex flex-col text-justify">
                                <div class="flex flex-col">
                                    <span>Deskripsi</span>
                                    <span class="ml-3 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam dolorem eius ipsum cupiditate inventore, maiores debitis. Et nostrum molestiae aliquid debitis ipsum nam rerum, fugiat sed ipsa aliquam, cum quidem.</span>
                                </div>
                                <div class="flex flex-col">
                                    <span>NIM</span>
                                    <span class="ml-3 text-gray-600">221810213</span>
                                </div>
                                <div class="flex flex-col">
                                    <span>No WA</span>
                                    <span class="ml-3 text-gray-600">082360054904</span>
                                </div>
                                <div class="flex flex-col">
                                    <span>Alamat Kos</span>
                                    <span class="ml-3 text-gray-600">Jl H Hasbi No 16, Kos Omega, Bidara Cina, Jakarta Timur</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-8 lg:col-span-9">
                    <div class="bg-white p-1 rounded-lg mb-2.5">
                        <div class="grid grid-cols-2 justify-center items-center gap-3 mb-0.5 text-gray-700">
                            <button class="bg-blue-200 hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5">
                                <div class="font-semibold">Tanggapan</div>
                            </button>
                            <button class="hover:bg-blue-500 hover:text-white rounded-lg flex justify-center py-0.5">
                                <div class="font-semibold">Thread</div>
                            </button>
                        </div>
                        <!-- <div class="bg-birumateri w-full h-0.5 rounded-3xl"></div> -->
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

                    <div class="bg-white w-full p-3 rounded-lg mb-2.5">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <div class="ml-2">
                                <div class="font-semibold">221810213@stis.ac.id</div>
                                <div class="text-xs italic">Dijawab pada 04-06-2020 08:23</div>
                            </div>
                        </div>
                        <div class="flex m-1">
                            <div class="flex flex-col items-center ml-2">
                                <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                    </svg>
                                </button>
                                <span>6</span>
                                <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <span class="ml-2">Apakah orang gila yang telah sembuh, sadar dan ingat bahwa dulu dirinya pernah gila?</span>
                        </div>
                        <hr class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-semibold ml-3">4 jawaban</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="bg-white w-full p-3 rounded-lg mb-2.5">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <div class="ml-2">
                                <div class="font-semibold">221810213@stis.ac.id</div>
                                <div class="text-xs italic">Dijawab pada 04-06-2020 08:23</div>
                            </div>
                        </div>
                        <div class="flex m-1">
                            <div class="flex flex-col items-center ml-2">
                                <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                    </svg>
                                </button>
                                <span>6</span>
                                <button class="flex items-center justify-center rounded-sm h-7 w-7 bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <span class="ml-2">Apakah orang gila yang telah sembuh, sadar dan ingat bahwa dulu dirinya pernah gila?</span>
                        </div>
                        <hr class="mb-2">
                        <div class="flex justify-between">
                            <span class="font-semibold ml-3">4 jawaban</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
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
    props: ['user'],
    mounted() {
        console.log(this.user)
    },
    methods: {
        coba() {
            this.$swal('Halo')
        }
    }
}
</script>
