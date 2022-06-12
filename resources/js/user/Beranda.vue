<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-2/3 lg:w-1/2 flex flex-col justify-center">
        <div class="mt-4">
            <span class="font-bold text-lg mt-4">Thread Terbaru</span>
            <div class="bg-white w-full px-3 pt-3 rounded-lg mb-3" v-for="thread in daftarthread" :key="thread.idt">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div class="ml-2">
                        <div class="font-semibold">{{ thread.nama }} <span class="text-xxs">({{ thread.nim }})</span></div>
                        <div class="text-xs italic">Dibuat pada {{ thread.date }}</div>
                    </div>
                </div>
                <div class="flex m-1">
                    <div class="flex flex-col items-center ml-2">
                        <button @click.prevent="dukung(thread.idt, 'naik')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(thread.pilihan == 'naik') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span>{{ thread.tdukungan }}</span>
                        <button @click.prevent="dukung(thread.idt, 'turun')" class="flex items-center justify-center rounded-sm h-7 w-7" :class="(thread.pilihan == 'turun') ? 'bg-birumateri text-white hover:bg-blue-400 hover:text-gray-700':'bg-gray-50 hover:bg-gray-400 text-gray-700 border border-gray-200'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col ml-3.5">
                        <span class="font-bold text-lg mb-2" v-html="thread.judul"></span>
                        <span v-html="thread.isi"></span>
                    </div>
                </div>
                <hr>
                <!-- <template>
                    <div id="app" class="flex items-center justify-center bg-gray-100">
                        <div class="relative text-lg w-48">
                            <button class="flex items-center justify-between px-3 py-2 bg-white w-full border border-gray-500 rounded-lg" @click="isOptionsExpanded = !isOptionsExpanded" @blur="isOptionsExpanded = false">
                                <span>{{ selectedOption }}</span>
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 transform transition-transform duration-200 ease-in-out" :class="isOptionsExpanded ? 'rotate-180' : 'rotate-0'">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <transition enter-active-class="transform transition duration-500 ease-custom" enter-class="-translate-y-1/2 scale-y-0 opacity-0" enter-to-class="translate-y-0 scale-y-100 opacity-100" leave-active-class="transform transition duration-300 ease-custom" leave-class="translate-y-0 scale-y-100 opacity-100" leave-to-class="-translate-y-1/2 scale-y-0 opacity-0">
                                <ul v-show="isOptionsExpanded" class="absolute left-0 right-0 mb-4 bg-white divide-y rounded-lg shadow-lg overflow-hidden">
                                    <li v-for="(option, index) in options" :key="index" class="px-3 py-2 transition-colors duration-300 hover:bg-gray-200" @mousedown.prevent="setOption(option)">
                                        {{ option }}
                                    </li>
                                </ul>
                            </transition>
                        </div>
                    </div>
                </template> -->
                <div class="flex justify-between py-1.5">
                    <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-3" v-if="thread.tmenanggapi == 0">Belum ada tanggapan</button>
                    <button @click.prevent="tanggapi(thread.idt)" class="font-semibold ml-2 hover:bg-blue-200 rounded-2xl px-3" v-else>Lihat {{ thread.tmenanggapi }} jawaban</button>
                    <div class="relative">
                        <button @click="isOptionsExpanded = !isOptionsExpanded" @blur="isOptionsExpanded = false" class="relative flex items-center px-3 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                        <div v-show="isOptionsExpanded" class="origin-top-right absolute bottom-8 right-0 w-32 bg-white rounded-lg border">
                            <a class="block hover:bg-gray-200 px-4 py-1 font-medium text-gray-800 text-center cursor-pointer" @mousedown.prevent="laporkan(thread.idt)">Laporkan</a>
                        </div>
                    </div>
                    <!-- <div class="relative" @click="isOptionsExpanded = !isOptionsExpanded" @blur="isOptionsExpanded = false">
                        <button class="relative px-3 py-1 rounded-lg">
                        </button> -->
                    <!-- <div v-show="isOptionsExpanded" class="absolute flex right-0 w-40 mb-4 bg-white divide-y rounded-lg shadow-lg overflow-hidden">
                            <a href="#" class="px-3 py-2 transition-colors duration-300 hover:bg-gray-200">
                                Bernaldo Napitupulu
                            </a>
                        </div> -->
                    <!-- <div v-show="isOptionsExpanded" class="origin-top-right absolute right-0 mt-2 w-32 bg-white rounded-lg border py-2 text-right">
                            <a href="#" class="block hover:bg-gray-200 my-1 px-4 py-1 font-medium text-gray-800">Action 1</a>
                            <a href="#" class="block hover:bg-gray-200 my-1 px-4 py-1 font-medium text-gray-800">Action 2</a>
                            <a href="#" class="block hover:bg-gray-200 my-1 px-4 py-1 font-medium text-gray-800">Action 3</a>
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            daftarthread: '',
            isOptionsExpanded: false,
        }
    },
    mounted() {
        this.getthread()
    },
    methods: {
        getthread() {
            axios.get('/api/user/getthread', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                this.daftarthread = response.data
                console.log(this.daftarthread)
            })
        },
        tanggapi(idt) {
            this.$router.push('/user/tanggapi/' + idt)
        },
        dukung(idt, pilihan) {
            let detail = {
                'idt': idt,
                'pilihan': pilihan
            }
            axios.post('/api/user/dukung/thread', detail, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then(
                this.getthread()
            )
        },
        laporkan(idt){
            console.log(idt)
        }
    }
}
</script>
