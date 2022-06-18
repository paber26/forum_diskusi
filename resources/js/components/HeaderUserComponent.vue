<template>
<div class="bg-blue-200 fixed inset-x-0 z-50">
    <div class="sm:flex justify-between hidden">
        <div class="flex items-center">
            <router-link to="/user" class="px-3 py-1 m-1.5 rounded-md hover:bg-yellow-300 hover:no-underline font-bold text-2xl mx-2">FORUM DISKUSI</router-link>
            <router-link to="/user/petunjuk" class="px-3 py-1 m-1.5 rounded-md hover:bg-yellow-300 hover:no-underline font-semibold">Petunjuk</router-link>
            <router-link to="/user/buat_thread" class="px-3 py-1 m-1.5 rounded-md hover:bg-yellow-300 hover:no-underline font-semibold">Buat Thread</router-link>
            <router-link to="/user/profil" class="px-3 py-1 m-1.5 rounded-md hover:bg-yellow-300 hover:no-underline font-semibold">Profil</router-link>
        </div>
        <div class="flex items-center">
            <img :src="user.gambar" class="h-7 w-7 rounded-full" v-if="user.gambar != ''">
            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="relative">
                <button @click="show = !show" @blur="show = false" class="font-semibold ml-2 mr-3">
                    {{ user.nama }}
                </button>
                <div v-show="show" class="origin-top-right absolute right-0 mt-1 mr-2 w-36 bg-white rounded-lg border text-center">
                    <a class="block hover:bg-gray-200 px-4 py-2 font-medium text-gray-800 cursor-pointer" @mousedown.prevent="logout()">Log Out</a>
                </div>
            </div>
        </div>

    </div>
    <div class="sm:hidden flex justify-between items-center">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
            <span class="text-sm font-bold">Menu</span>
        </div>
        <div class="flex flex-row items-center w-52">
            <div class="font-bold text-right">
                <div class="text-2xl">Forum Diskusi</div>
                <div class="text-lg -mt-2">Polstat STIS</div>
            </div>
            <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-10 h-10">
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            show: false
        }
    },
    methods: {
        logout() {
            console.log('logout')
            axios.post("/user/logout").then(response => {
                window.location.href = response.data;
            });
        }
    }
}
</script>
