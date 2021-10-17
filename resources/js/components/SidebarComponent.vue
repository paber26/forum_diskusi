<template>
<div class="bg-blue-300 hidden sm:block">
    <div class="p-1 flex flex-col justify-center items-center h-46 w-40">
        <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-20">
        <div class="font-bold text-2xl">Modul</div>
        <div class="font-bold text-lg -mt-2">Polstat STIS</div>
    </div>
    <div class="w-full border-solid border-2 border-gray-300"></div>
    <div class="flex flex-col mt-3">
        <router-link to="/" class="p-1.5 m-1.5 rounded-md hover:bg-yellow-300 font-semibold">Beranda</router-link>
        <div class="m-1">
            <button @click.prevent="klikmodul()" class="p-1.5 rounded-md hover:bg-yellow-300 flex justify-between items-center w-full">
                <div class="font-semibold">Modul</div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div v-if="showmodul" class="ml-3 flex flex-col">
                <router-link to="/d3-statistika" class="p-1.5 rounded-md hover:bg-yellow-300">D-3 Statistika</router-link>
                <router-link to="/d4-statistika" class="p-1.5 rounded-md hover:bg-yellow-300">D-4 Statistika</router-link>
                <router-link to="/d4-komputasi-statistik" class="p-1.5 rounded-md hover:bg-yellow-300">D-4 Komputasi Statistik</router-link>
            </div>
        </div>

        <router-link to="/arsipsoal" class="p-1.5 m-1 rounded-md hover:bg-yellow-300 font-semibold">Arsip Soal</router-link>
        <router-link to="/forum" class="p-1.5 m-1 rounded-md hover:bg-yellow-300 font-semibold">Forum Tanya Jawab</router-link>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            showmodul: false
        }
    },
    methods: {
        klikmodul: function () {
            this.showmodul = !this.showmodul
            console.log(this.showmodul)
        }
    }
}
</script>
