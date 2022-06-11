<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-4/5 flex flex-col justify-center">
        <span class="font-bold text-xl mt-3 mb-2">Buat Thread</span>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 sm:col-span-8 lg:col-span-9">
                <div class="bg-white w-full p-3 rounded-lg mb-2.5">
                    <div class="grid grid-cols-6 items-center">
                        <label class="col-span-1">Judul Thread</label>
                        <div class="col-span-5">
                            <input class="w-full border-2 border-gray-200 rounded-md p-1.5" name="judul" id="judul" type="text" placeholder="Masukkan Judul Thread ..." v-model="fields.judul">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <label class="col-span-1">Isi Thread</label>
                        <div class="col-span-1">
                            <vue-editor v-model="fields.isi"></vue-editor>
                        </div>
                    </div>
                    <div class="flex justify-between -mb-1">
                        <button @click.prevent="simpan()" class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-2 rounded-lg ml-3">
                            Simpan Draft
                        </button>
                        <button @click.prevent="upload()" class="bg-green-500 hover:bg-green-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                            Upload
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 lg:col-span-3 order-first sm:order-last">
                <div class="bg-white w-full p-2 rounded-md mb-2">
                    <div class="">
                        <label class="font-medium text-sm">Draft</label>
                        <div class="px-2">
                            <div class="text-xs font-semibold">Apakah orang gila yang telah sembuh, sadar dan ingat bahwa dulu dirinya pernah gila?</div>
                            <span class="text-xxs italic">07-06-2022 16:45</span>
                            <hr class="my-2">
                        </div>
                        <div class="px-2">
                            <div class="text-xs font-semibold">Apakah orang gila yang telah sembuh, sadar dan ingat bahwa dulu dirinya pernah gila?</div>
                            <span class="text-xxs italic">07-06-2022 16:45</span>
                            <hr class="my-2">
                        </div>
                    </div>
                </div>
                <div class="bg-white w-full p-2 rounded-md">
                    <label class="font-medium text-sm">Pilih Kategori</label>
                    <select id="countries" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <option selected>Kategori</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
            </div>

        </div>

        <!-- <div class="mt-3" v-if="fields.judul != '' || fields.isi != ''">
            <span class="font-bold text-lg mb-2">Tampilan Thread</span>
            <div class="bg-white w-full p-3 rounded-lg">
                <span class="font-bold text-gray-700" v-html="fields.judul"></span>
                <div class="mt-2" v-html="fields.isi"></div>
                <div class="mt-2">{{ fields.isi }}</div>
            </div>
        </div> -->
    </div>
    <div class="mb-5"></div>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            fields: {
                judul: '',
                isi: ''
            }
        }
    },
    mounted() {
        console.log(this.user)
    },
    methods: {
        profiledit() {
            this.$router.push({
                path: '/user/profil/edit'
            })
        },

        upload() {
            if (this.fields.judul == '') {
                this.$swal('Masukkan Judul')
                return
            }
            if (this.fields.isi == '') {
                this.$swal('Masukkan Isi')
                return
            }
            axios.post('/api/user/buat_thread', this.fields, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(response => {
                if (response.data == 'Berhasil') {
                    this.$swal('Thread Berhasil Ditambahkan')
                    this.$router.push('/user')
                }
            })
        },
    }
}
</script>
