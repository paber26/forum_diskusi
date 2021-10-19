<template>
<div class="flex flex-col justify-center">
    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="font-bold text-xl">Forum Tanya Jawab</div>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="w-11/12 mt-2.5">
            <div class="bg-gray-400 rounded-t-lg p-1.5 font-semibold text-base">Filter</div>
            <div class="bg-gray-200 rounded-b-lg grid grid-cols-12 gap-6 p-2">
                <div class="col-span-12 md:col-span-6">
                    <div>Program Studi</div>
                    <select class="p-1 bg-white rounded-lg w-full">
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
                <div class="col-span-12 md:col-span-6">
                    <div>Kategori</div>
                    <select class="p-1 bg-white rounded-lg w-full">
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
            </div>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-3 rounded-lg">
            <div class="p-2">
                <div>
                    <div class="font-bold text-blue-600">Aljabar Linear</div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex flex-col">
                            <div class="font-semibold">Bernaldo Napitupulu</div>
                            <div class="text-xxs">19 Oktober 2021</div>
                        </div>
                    </div>
                    <div class="ml-4">
                        Diketahui bentuk kuadrat<br>
                        a. Tuliskan bentuk kuadrat q dalam bentuk matriks<br>
                        b. SEderhanakan persamaan q(x) menjadi bentuk persamaan yang setara, melalui transformasi x=By dimana B adalah matriks non singular, sedemikian sehingga B^TAB=D dimana dij=0 untuk i/=j<br>
                        c. Periksa bentuk kedefinitan bentuk kuadrat q
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
