<template>
<div class="bg-blue-300 hidden sm:block w-60">
    <div class="p-1 flex flex-col justify-center items-center h-46">
        <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-20">
        <div class="font-bold text-2xl">Forum Diskusi</div>
        <div class="font-bold text-lg -mt-2">Polstat STIS</div>
    </div>
    <div class="flex flex-col">
        <router-link to="/" class="p-1.5 m-1.5 rounded-md hover:bg-yellow-300 font-semibold">Beranda</router-link>
        <router-link to="/thread" class="p-1.5 m-1.5 rounded-md hover:bg-yellow-300 font-semibold">Thread</router-link>
        <router-link to="/tanggapan" class="p-1.5 m-1.5 rounded-md hover:bg-yellow-300 font-semibold">Tanggapan</router-link>
        <router-link to="/laporan" class="p-1.5 m-1.5 rounded-md hover:bg-yellow-300 font-semibold">Laporan</router-link>
        <router-link to="/logout" class="p-1.5 m-1.5 rounded-md hover:bg-yellow-300 font-semibold">Logout </router-link>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            showmateri: false,
            showarsipsoal: false
        }
    },
    methods: {
        klikmateri: function(){
            this.showmateri = !this.showmateri
            this.showarsipsoal = false
        },
        klikarsipsoal: function () {
            this.showarsipsoal = !this.showarsipsoal
            this.showmateri = false
        }
    }
}
</script>
