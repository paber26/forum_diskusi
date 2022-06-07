<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">

        <span class="font-bold text-xl mt-3 mb-2">Buat Thread</span>
        <div class="bg-white w-full p-3 rounded-lg">
            <form name="form" action="/user/buat_thread" method="POST">
                <div class="form-group row"><label class="col-sm-2 col-form-label">Judul Thread</label>
                    <div class="col-sm-10">
                        <input name="judul" type="text" class="form-control" placeholder="Masukkan Judul Thread ...">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Isi Thread</label>
                    <div class="col-sm-12">
                        <textarea placeholder="Masukkan Isi Thread ..." class="form-control rounded-md h-100"></textarea>
                        <!-- <input name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat Kos"> -->
                    </div>
                </div>
                <div class="form-group row flex justify-between">
                    <button @click.prevent="simpan()" class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-2 rounded-lg ml-3">
                        Simpan Draft
                    </button>
                    <button @click.prevent="simpan()" class="bg-green-500 hover:bg-green-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                        Upload
                    </button>
                </div>
            </form>
        </div>

        <span class="font-bold text-xl mt-3 mb-2">Tampilan Thread</span>
        <div class="bg-white w-full p-3 rounded-lg">
            <span class="font-bold text-gray-700">Judul Pertanyaan</span>
            <div class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga ducimus dolores cumque vero repellat reprehenderit, autem minus, blanditiis laboriosam enim sint unde. Culpa pariatur amet velit aut itaque voluptates accusantium non tempore nulla ipsa error, sed nobis veniam excepturi ad placeat dolore ut dignissimos voluptatem suscipit corporis incidunt quidem voluptate. Odit autem eius itaque quam reprehenderit, dignissimos et mollitia ipsum, ratione id aut, illo quia laborum nobis. Dignissimos earum repellat vitae labore voluptate iure, odit unde saepe cupiditate, inventore doloribus optio debitis commodi. Repellat vel adipisci architecto deleniti perferendis illum magnam quaerat tempora? Quae enim deserunt pariatur dicta quam nulla magnam voluptate repudiandae, nobis exercitationem dolore reiciendis totam necessitatibus esse, ducimus deleniti repellat sequi tempore reprehenderit? Vel sit exercitationem eaque eveniet, deleniti unde, eligendi, quas asperiores molestias vitae fugit. Expedita culpa, libero, pariatur exercitationem dolorem labore voluptates a veniam hic quia dolor tenetur blanditiis! Illum unde repellat commodi perferendis facilis debitis odit tempore ducimus. Ullam mollitia perspiciatis id porro exercitationem pariatur dolores quae, reiciendis earum dolore ducimus facere fuga quibusdam vitae similique nostrum harum. Similique ab aut sapiente reiciendis dignissimos doloribus incidunt voluptates, voluptatibus nam. Odio blanditiis dolore temporibus maxime voluptas, maiores ratione a possimus doloribus, eaque at officia voluptate!</div>
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
        profiledit() {
            this.$router.push({
                path: '/user/profil/edit'
            })
        },
        simpan() {}
    }
}
</script>
