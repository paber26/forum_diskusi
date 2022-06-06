<template>
<div class="bg-blue-200 p-2.5">
    <div class="sm:flex justify-between hidden">
        <div class="flex items-center">
            <span class="font-bold text-2xl mx-2">FORUM DISKUSI</span>
            <span class="font-semibold mx-4">Petunjuk</span>
            <span class="font-semibold mx-4">Buat Thread</span>
            <span class="font-semibold mx-4">Pencarian</span>
        </div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <button @click="show = !show" class="font-semibold ml-2 mr-3">{{ user.nama }}</button>

            <div v-show="show" class="flex flex-col mt-4 bg-white rounded-md ring-2 ring-black ring-opacity-5  absolute -0 w-44">
                <!-- <button to="/profil" class="block text-center font-medium pt-1 rounded-t-md hover:bg-yellow-200  hover:no-underline">Profil</button> -->
                <!-- <hr> -->
                <button @click="logout()" class="block text-center font-medium pt-1 rounded-b-md hover:bg-yellow-200  hover:no-underline">Log Out</button>
            </div>
        </div>

    </div>
    <div class="sm:hidden flex justify-between items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
        <div class="flex flex-row items-center w-36">
            <div class="font-bold text-right">
                <div class="text-2xl">Modul</div>
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
            axios.post("/admin/logout").then(response => {
                window.location.href = response.data;
            });
        }
    }
}
</script>
