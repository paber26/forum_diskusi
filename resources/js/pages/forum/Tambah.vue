<template>
<div class="flex flex-col justify-center">
    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="font-bold text-xl">Forum Tanya Jawab</div>
            <div class="font-bold text-base">Tambah Pertanyaan</div>
        </div>
    </div>

    <div class="flex w-full justify-center mb-7">
        <div class="bg-gray-200 w-11/12 mt-3 p-2 rounded-2xl">
            <form @submit.prevent="checkForm" class="flex flex-col">
                <div class="font-bold text-lg -mb-2 text-blue-500">Masukkan pertanyaan</div>
                <textarea class="p-3 rounded-md m-2 h-56" placeholder="Masukkan pertanyaan ..." v-model="fields.pertanyaan"></textarea>
                <div v-if="fields.pertanyaan!=''" class="flex flex-col">
                    <span class="font-bold text-base text-blue-500">Tampilan pertanyaan</span>
                    <span class="p-3 mx-2 bg-white rounded-md" v-html="fields.pertanyaan"></span>
                </div>

                <div class="p-2">
                    <div class="flex flex-col">
                        <span class="font-semibold text-base">DIV Statistika</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="fields.se">
                            <label class="form-check-label inline-block text-gray-700">Statistik Ekonomi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="fields.sk">
                            <label class="form-check-label inline-block text-gray-700">Statistik Kependudukan</label>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-semibold text-base">DIV Komputasi Statistik</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="fields.sd">
                            <label class="form-check-label inline-block text-gray-700">Sains Data</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="fields.si">
                            <label class="form-check-label inline-block text-gray-700">Sistem Informasi</label>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-semibold text-base">DIII Statistika</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="fields.d3">
                            <label class="form-check-label inline-block text-gray-700">DIII Statistika</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="bg-birumateri w-32 m-1 p-0.5 rounded-xl text-white text-center hover:bg-blue-400">Tambahkan</button>
            </form>
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
                pertanyaan: '',
                se: false,
                sk: false,
                sd: false,
                si: false,
                d3: false
            }
        }
    },
    methods: {
        checkForm: function () {
            if (this.fields.pertanyaan == '') {
                this.$swal('Pertanyaan tidak boleh kosong')
                return
            }
            if (!(this.fields.se || this.fields.sk || this.fields.sd || this.fields.si || this.fields.d3)) {
                this.$swal('Pilih peminatan')
                return
            }
            axios.post('/api/tambahpertanyaan', this.fields, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                if (response.data == 'Berhasil') {
                    this.$router.push({
                        path: '/forum'
                    })
                    this.$swal('Berhasil menambahkan pertanyaan')
                }
            })
        },
    }
}
</script>
