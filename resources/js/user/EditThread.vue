<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-3/4 mt-3 sm:mt-0 flex flex-col justify-center">
        <span class="font-bold text-xl mt-3 mb-2">Buat Thread</span>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 sm:col-span-8 lg:col-span-9">
                <div class="bg-white w-full p-2 rounded-md mb-2">
                    <label class="font-medium text-sm">Pilih Kategori</label>
                    <select v-model="fields.kategori" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5">
                        <option value="" selected>Kategori</option>
                        <option value="Pertanyaan">Pertanyaan</option>
                        <option value="Informasi">Informasi Statistik</option>
                        <option value="Ulasan">Ulasan Jurnal/Buku/Sumber lainnya</option>
                    </select>
                </div>
                <div class="bg-white flex flex-col w-full p-2 rounded-md mb-2">
                    <label class="font-medium text-sm">Status Tanggapan</label>
                    <div class="flex items-center">
                        <input type="radio" value="aktif" v-model="fields.stanggapan">
                        <div class="font-semibold ml-1" for="aktif">Aktifkan Tanggapan</div>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" value="nonaktif" v-model="fields.stanggapan">
                        <div class="font-semibold ml-1" for="nonaktif">Nonaktifkan Tanggapan</div>
                    </div>
                    
                    <span class="text-xs italic mt-1">Nonaktifkan tanggapan berfungsi agar thread tidak dapat ditanggapi pengguna lain</span>
                </div>
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
                        <button @click.prevent="hapus()" class="bg-red-500 hover:bg-red-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                            Hapus
                        </button>
                        <button @click.prevent="simpanperubahanthread()" class="bg-green-500 hover:bg-green-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 lg:col-span-3 order-first sm:order-last">
                <div class="bg-white w-full p-2 rounded-md mb-2">
                    <label class="font-medium text-sm">Draft</label>
                    <div v-for="draft in daftardraft" :key="draft.idd">
                        <a :href="'/user/buat_thread/' + draft.idd" class="hover:underline cursor-pointer">
                            <div class="text-xs font-semibold">{{ draft.judul }}</div>
                            <span class="text-xxs italic">{{ draft.date }}</span>
                            <hr class="my-2">
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="mb-5"></div>
</div>
</template>

<script>
export default {
    props: ['user', 'idt'],
    data() {
        return {
            fields: {
                idt: this.idt,
                kategori: '',
                judul: '',
                isi: '',
                stanggapan: ''
            },
            daftardraft: ''
        }
    },
    mounted() {
        axios.get('/api/user/getthread/' + this.idt, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            console.log(response.data)
            this.thread = response.data
            this.fields.kategori = response.data.kategori
            this.fields.judul = response.data.judul
            this.fields.isi = response.data.isi
            this.fields.stanggapan = response.data.stanggapan
        })
        axios.get('/api/user/getdraftthread', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.daftardraft = response.data
        })
    },
    methods: {
        buka(idd) {
            this.$router.push({
                path: '/user/buat_thread/' + idd
            })
        },
        simpanperubahanthread() {
            if (this.fields.kategori == '') {
                this.$swal('Pilih Kategori Thread')
                return
            }
            if (this.fields.judul == '') {
                this.$swal('Masukkan Judul')
                return
            }
            if (this.fields.isi == '') {
                this.$swal('Masukkan Isi')
                return
            }
            axios.post('/api/user/edit_thread', this.fields, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(response => {
                if (response.data == 'Berhasil') {
                    this.$swal('Thread Berhasil Diubah')
                    this.$router.push('/user/profil')
                }
            })
        },
        hapus() {
            this.$swal({
                title: 'Apakah kamu yakin ingin menghapus?',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/user/edit_thread/hapus/' + this.idt, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + this.user.api_token
                        },
                    }).then((response) => {
                        this.$swal({
                            text: 'Berhasil menghapus',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        this.$router.push('/user/profil')
                    })
                }
            })
        }

    }
}
</script>
