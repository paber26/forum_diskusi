<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">

        <span class="font-bold text-xl mt-3 mb-2">Buat Thread</span>
        <div class="bg-white w-full p-3 rounded-lg">
            <form name="form" action="/user/buat_thread" method="POST">
                <div class="form-group row"><label class="col-sm-2 col-form-label">Judul Thread</label>
                    <div class="col-sm-10">
                        <input name="judul" id="judul" type="text" class="form-control" placeholder="Masukkan Judul Thread ..." v-model="fields.judul">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Isi Thread</label>
                    <div class="col-sm-12">
                        <textarea name="isi" class="form-control rounded-md h-100" id="isi" v-model="fields.isi"></textarea>
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

        <div class="mt-3" v-if="fields.judul != '' || fields.isi != ''">
            <span class="font-bold text-lg mb-2">Tampilan Thread</span>
            <div class="bg-white w-full p-3 rounded-lg">
                <span class="font-bold text-gray-700" v-html="fields.judul"></span>
                <div class="mt-2" v-html="fields.isi"></div>
            </div>
        </div>
    </div>
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
        simpan() {
            console.log(this.fields.isi)
        }
    }
}
</script>
