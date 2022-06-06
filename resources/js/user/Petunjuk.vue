<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <div class="mt-4">
            <span class="font-bold text-lg mt-4">Peraturan Pada Form Ini</span>
            <div class="bg-white w-full p-3 rounded-2xl mb-3">
                <span class="font-semibold">Syarat dan Ketentuan Posting</span>
                <ul class="list-none">
                    <li class="flex flex-row items-center">
                        <div class="w-5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg></div>
                        <div class="text-left">Dilarang keras membuat thread yang mengandung sara, pornografi dan lainnya yang bersifat negatif</div>
                    </li>
                    <li class="flex flex-row items-center">
                        <div class="w-5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg></div>
                        <div class="text-left">Dilarang memasukkan foto kedalam thread atau tanggapan yang mengandung sara, pornografi dan lainnya yang bersifat negatif</div>
                    </li>
                    <li class="flex flex-row items-center">
                        <div class="w-5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg></div>
                        <div class="text-left">Ketika ingin membuat sebuah thread sesuaikan dengan kategorinya</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    methods: {
        coba() {
            this.$swal('Halo')
        }
    }
}
</script>
