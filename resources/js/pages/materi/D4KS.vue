<template>
<div class="flex flex-col justify-center">
    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="font-bold text-2xl">Materi</div>
            <div class="font-bold text-xl">D-4 Komputasi Statistik</div>
        </div>
    </div>

    <div class="flex w-full justify-center">
        <div class="bg-gray-200 w-11/12 mt-4 p-2 rounded-2xl">
            <div class="flex items-center">
                <div class="font-bold text-base">Mata Kuliah</div>
                <!-- <select class="ml-3 p-1.5 bg-white rounded-xl w-2/5 flex items-center justify-between outline-none">
                    <option disabled selected>Pilih mata kuliah</option>
                    <option v-for="d4ks in daftararsipsoal" :key="d4ks.id" @click.prevent="lihatmateri(d4ks.mid)">{{ d4ks.nama }}</option>
                </select> -->

            </div>
            <div class="grid grid-cols-12 gap-2 mt-2 font-semibold text-white py-2">
                <button v-for="d4ks in daftararsipsoal" :key="d4ks.id" @click.prevent="lihatmateri(d4ks.mid)" class="p-5 bg-birumateri hover:bg-yellow-300 rounded-xl col-span-12 sm:col-span-6 lg:col-span-4 text-center">{{ d4ks.nama }}</button>
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
            daftararsipsoal: '',
        }
    },
    mounted() {
        console.log(this.user)
        axios.get('/api/getdaftarmatkul/d4ks', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + this.user.api_token
            },
        }).then((response) => {
            this.daftararsipsoal = response.data
        })
    },
    methods: {
        lihatmateri(mid) {
            axios.get('/api/getimid/' + mid, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + this.user.api_token
                },
            }).then((response) => {
                let imid = response.data
                if (imid == 0) {
                    this.$swal('Belum ada isinya')
                } else {
                    window.location.href = window.location.origin + "/materi/d4ks/" + mid + '/' + imid;
                }
            })
        }
    }
}
</script>
