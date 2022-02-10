<template>
<div class="flex flex-col justify-center">
    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="font-bold text-base">Arsip Soal</div>
            <div class="font-bold text-xl">D-4 Komputasi Statistik</div>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="flex items-center">
                <div class="font-bold text-base">Kategori</div>
                <select class="ml-3 p-1.5 bg-white rounded-xl w-2/5 flex items-center justify-between">
                    <option disabled selected>Isi Kategori</option>
                    <option>Aljabar Linear</option>
                    <option>Kalkulus I</option>
                    <option>Metode Statistik I</option>
                    <option>Pengantar Teknologi Informasi</option>
                    <option>Pengantar Teori Peluang</option>
                    <option>Metode Penarikan Contoh</option>
                    <option>Analisis Data Eksploratif</option>
                    <option>Statistika Matematika I</option>
                    <option>Kalkulus II</option>
                </select>

            </div>
            <div class="grid grid-cols-12 gap-2 mt-2 font-semibold text-white py-2">
                <button v-for="d4ks in daftararsipsoal" :key="d4ks.id" @click.prevent="lihatmodul(d4ks.mid)" class="p-5 bg-birumateri hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">{{ d4ks.nama }}</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            daftararsipsoal: []
        }
    },
    mounted() {
        axios.get('/api/getdaftarmateri/d4-komputasi-statistik').then((response) =>{
            this.daftararsipsoal = response.data
            console.log(response.data)
            console.log('yes')
        })
    },
    methods: {
        lihatmodul(mid){
            this.$router.push({
                path: '/daftararsipsoal/d4-komputasi-statistik/edit/' + mid,
                params: {
                    mid
                }
            })
        }
    }
}
</script>