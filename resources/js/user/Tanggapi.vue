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
                        <div class="font-semibold">Bernaldo Napitupulu</div>
                        <div class="text-xs italic">Dibuat pada 04-06-2020 08:23</div>
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
                <hr>
                <div class="flex justify-between py-1.5">
                    <span class="font-semibold ml-2">4 tanggapan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="mt-2">
            <span class="font-bold text-base mt-2">Tanggapan</span>
            <div class="bg-white w-full px-3 pt-3 rounded-lg mb-3">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">Bernaldo Napitupulu</div>
                        <div class="text-xs italic">Menanggapi pada 04-06-2020 08:23</div>
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
            <div class="bg-white w-full p-3 rounded-lg mb-3">
                <form name="form" action="/user/tanggapi" method="POST">
                    <div class="form-group row">
                        <!-- <label class="col-sm-12 col-form-label">Isi Tanggapan</label> -->
                        <div class="col-sm-12">
                            <textarea placeholder="Tulis tanggapan ..." class="form-control rounded-md h-100"></textarea>
                            <!-- <input name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat Kos"> -->
                        </div>
                    </div>
                    <div class="form-group row flex justify-between -mb-1">
                        <button @click.prevent="simpan()" class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-2 rounded-lg ml-3">
                            Simpan Draft
                        </button>
                        <button @click.prevent="simpan()" class="bg-green-500 hover:bg-green-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                            Upload
                        </button>
                    </div>
                </form>
            </div>

            <span class="font-bold text-lg mt-6 mb-2">Tampilan Tambah Tanggapan</span>
            <div class="bg-white w-full p-3 rounded-lg">
                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga ducimus dolores cumque vero repellat reprehenderit, autem minus, blanditiis laboriosam enim sint unde. Culpa pariatur amet velit aut itaque voluptates accusantium non tempore nulla ipsa error, sed nobis veniam excepturi ad placeat dolore ut dignissimos voluptatem suscipit corporis incidunt quidem voluptate. Odit autem eius itaque quam reprehenderit, dignissimos et mollitia ipsum, ratione id aut, illo quia laborum nobis. Dignissimos earum repellat vitae labore voluptate iure, odit unde saepe cupiditate, inventore doloribus optio debitis commodi. Repellat vel adipisci architecto deleniti perferendis illum magnam quaerat tempora? Quae enim deserunt pariatur dicta quam nulla magnam voluptate repudiandae, nobis exercitationem dolore reiciendis totam necessitatibus esse, ducimus deleniti repellat sequi tempore reprehenderit? Vel sit exercitationem eaque eveniet, deleniti unde, eligendi, quas asperiores molestias vitae fugit. Expedita culpa, libero, pariatur exercitationem dolorem labore voluptates a veniam hic quia dolor tenetur blanditiis! Illum unde repellat commodi perferendis facilis debitis odit tempore ducimus. Ullam mollitia perspiciatis id porro exercitationem pariatur dolores quae, reiciendis earum dolore ducimus facere fuga quibusdam vitae similique nostrum harum. Similique ab aut sapiente reiciendis dignissimos doloribus incidunt voluptates, voluptatibus nam. Odio blanditiis dolore temporibus maxime voluptas, maiores ratione a possimus doloribus, eaque at officia voluptate!</span>
            </div>
        </div>
        <div class="mb-5"></div>
    </div>
</div>
</template>

<script>
export default {
    methods: {
        tanggapi() {
            this.$router.push('/user/tanggapi/saya')
        }
    }
}
</script>
