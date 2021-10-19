<template>
<div class="flex flex-col justify-center">
    <div class="flex w-full justify-center">
        <div class="bg-gray-300 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="font-bold text-base">Arsip Soal</div>
            <div class="font-bold text-xl">D-4 Komputasi Statistik</div>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="bg-gray-300 w-11/12 mt-4 p-2 rounded-2xl">
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
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg> -->
                </select>

            </div>
            <div class="grid grid-cols-12 gap-2 mt-2 font-semibold text-white py-2">
                <a href="/arsipsoal/aljabar-linear" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Aljabar Linear</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Kalkulus I</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Metode Statistik I</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Pengantar Teknologi Informasi</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Pengantar Teori Peluang</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Metode Penarikan Contoh</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Analisis Data Eksploratif</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Statistika Matematika I</a>
                <a href="/modul/" class="p-5 bg-birumodul hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">Kalkulus II</a>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            showisikategori: false,
        }
    },
    methods: {
        klikisikategori: function () {
            this.showisikategori = !this.showisikategori
            console.log(this.showisikategori)
        }
    }
}
</script>
