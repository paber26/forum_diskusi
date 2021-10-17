<template>
<div class="bg-blue-300 hidden sm:block">
    <div class="p-1 flex flex-col justify-center items-center h-46 w-32">
        <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-20">
        <div class="font-bold text-2xl">Modul</div>
        <div class="font-bold text-lg -mt-2">Polstat STIS</div>
    </div>
    <div class="w-full border-solid border-2 border-gray-300"></div>
    <div class="flex flex-col font-semibold mt-3">
        <router-link to="" class="bg-yellow-300 p-1.5 m-1.5 rounded-md hover:bg-yellow-300">Beranda</router-link>
        <router-link to="/modul" class="p-1.5 m-1 rounded-md hover:bg-yellow-300">Modul</router-link>
        <router-link to="/arsipsoal" class="p-1.5 m-1 rounded-md hover:bg-yellow-300">Arsip Soal</router-link>
        <router-link to="/forum" class="p-1.5 m-1 rounded-md hover:bg-yellow-300">Forum Tanya Jawab</router-link>
    </div>
    <!-- <ul class="font-semibold">
        <li class="bg-yellow-300 p-1.5 m-1.5 rounded-md">
            <router-link to="" class="bg-green-300">Beranda</router-link>
        </li>
        <li class="p-1.5 m-1.5">
            <router-link to="/modul">Modul</router-link>
        </li>
        <li class="p-1.5 m-1.5">Arsip Soal</li>
        <li class="p-1.5 m-1.5">Forum Tanya Jawab</li>
    </ul> -->
</div>
</template>
