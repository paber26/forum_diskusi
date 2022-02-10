<template>
<div class="flex flex-col min-h-screen min-w-min">
    <div class="flex flex-row items-center p-2 bg-blue-300 min-w-100">
        <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-10 h-10 sm:w-12 sm:h-12">
        <div class="font-bold ml-2 text-white sm:hidden">
            <div class="text-2xl sm:text-xl">Materi</div>
            <div class="text-lg sm:text-base -mt-2">Polstat STIS</div>
        </div>
        <div class="font-bold ml-2 text-2xl text-white hidden sm:flex">
            SIRADIG
        </div>
    </div>
    <div class="flex-row bg-birumateri items-center hidden sm:flex">
        <div class="text-white font-semibold text-xl ml-3">D-IV KS</div>
        <div class="bg-white h-6 w-0.5 mx-2"></div>
        <div class="text-white font-semibold text-xl">Aljabar Linear</div>
    </div>
    <div class="flex flex-col bg-birumateri sm:hidden">
        <div class="text-white font-semibold text-xl ml-3 -mt-1">D-IV KS</div>
        <div class="text-white font-semibold text-xl ml-3 -mt-2">Aljabar Linear</div>
    </div>
    <div class="bg-gray-200 flex-1">
        <div class="grid grid-cols-12 gap-1">
            <div class="col-span-12 sm:col-span-3 lg:col-span-2 p-2 -mt-4 mb-4 sm:mt-16 order-last sm:order-first">
                <h1 class="font-bold text-xl text-blue-500">Tahun Pelajaran</h1>
                <div class="ml-0.5">
                    <div v-for="arsipsoal in daftararsipsoal" :key="arsipsoal.id">
                        <div class="flex flex-row items-center">
                            <div class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="font-bold">{{ arsipsoal.tahun }}</div>
                        </div>
                        <div class="ml-3 flex flex-row items-center">
                            <div class="w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>{{ arsipsoal.nama }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-9 lg:col-span-10 m-2 p-2 rounded-2xl">
                <div class="flex flex-row justify-between">
                    <div class="font-bold text-xl w-72">UAS 2017/208</div>
                    <div class="flex flex-row-reverse items-center w-80">
                        <a href="/d4-komputasi-statistik" class="hover:bg-yellow-200 rounded-md p-1">
                            Arsip Soal D-IV KS
                        </a>
                        <span>/</span>
                        <a href="/" class="flex items-center hover:bg-yellow-200 rounded-md p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0    001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <div>Home</div>
                        </a>
                    </div>
                </div>
                <div class="bg-birumateri w-full h-0.5 rounded-3xl"></div>
                <div class="bg-white mt-2 p-3 rounded-2xl" v-for="soal in arsipsoal" :key="soal.id">
                    <div>
                        <div class="font-bold">Nomor {{ soal.tahun }}</div>
                        <span v-html="soal.pertanyaan"></span>
                    </div>
                    <div class="bg-birumateri w-full h-0.5 rounded-3xl"></div>
                    <div class="mt-1">
                        <div class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="font-semibold">Irene Savira</div>
                        </div>
                        <div class="ml-4">
                            Diketahui:<br>
                            <img class="flex justify-center items-center" src="https://latex.codecogs.com/png.latex?A=\left[\begin{matrix}-1&2&0\\2&0&-2\\0&-2&1\end{matrix}\right]" title="A=\left [ \begin{matrix} -1 & 2 & 0\\ 2 & 0 & -2\\ 0 & -2 & 1 \end{matrix} \right ]" /><br>
                            a. Gunakan metode OBE sebagai berikut
                            <img class="flex justify-center items-center" src="https://latex.codecogs.com/png.latex?\left[\begin{matrix}-1&2&0\\2&0&-2\\0&-2&1\end{matrix}\right]=\left[\begin{matrix}1&-2&0\\0&4&-2\\0&-2&1\end{matrix}\right]" title="\left [ \begin{matrix} -1 & 2 & 0\\ 2 & 0 & -2\\ 0 & -2 & 1 \end{matrix} \right ]=\left [ \begin{matrix} 1 & -2 & 0\\ 0 & 4 & -2\\ 0 & -2 & 1 \end{matrix} \right ]" /><br>
                            <img class="flex justify-center items-center" src="https://latex.codecogs.com/png.latex?M=\left[\begin{matrix}1&0&-1\\0&1&-0.5\\0&0&0\end{matrix}\right]" title="M=\left [ \begin{matrix} 1 & 0 & -1\\ 0 & 1 & -0.5\\ 0 & 0 & 0 \end{matrix} \right ]" /><br>
                            Rank = 2 (Dengan melihat jumlah dari baris yang terdapat leading satunya)<br>56[ ]
                            Rank = 1 (Dengan melihat baris yang terdiri dari elemen 0)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-blue-200 p-2 font-semibold">
        <div class="w-48">Politeknik Statistika STIS</div>
    </div>
</div>
</template>

<script>
export default {
    props: ['mid'],
    data() {
        return {
            daftararsipsoal: [],
            arsipsoal: []
        }
    },
    mounted() {
        axios.get('/api/getdaftararsipsoal/' + this.mid).then((response) => {
            this.daftararsipsoal = response.data
            console.log(this.mid)
            console.log(this.daftararsipsoal)
        })
        axios.get('/api/getarsipsoal/61ea7de1123a5').then((response) => {
            this.arsipsoal = response.data
            console.log(this.arsipsoal)
        })
    },

}
</script>
