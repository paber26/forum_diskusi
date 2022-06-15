<template>
<div class="bg-blue-200 p-2.5">
    <div class="sm:flex justify-end hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <button @click="show = !show" class="font-semibold text-base ml-2 mr-3">{{ user.nama }}</button>

        <div v-show="show" class="flex flex-col mt-4 bg-white rounded-md ring-2 ring-black ring-opacity-5  absolute -0 w-44">
            <!-- <button to="/profil" class="block text-center font-medium pt-1 rounded-t-md hover:bg-yellow-200  hover:no-underline">Profil</button> -->
            <!-- <hr> -->
            <button @click="logout()" class="block text-center font-medium pt-1 rounded-b-md hover:bg-yellow-200  hover:no-underline">Log Out</button>
        </div>
    </div>
    <div class="sm:hidden flex justify-between items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
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
            axios.post("/admin/logout").then(response => {
                window.location.href = response.data;
            });
        }
    }
}
</script>
