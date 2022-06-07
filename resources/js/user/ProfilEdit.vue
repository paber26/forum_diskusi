<template>
<div class="flex flex-col items-center w-full">
    <div class="w-5/6 sm:w-11/12 flex flex-col justify-center">
        <span class="font-bold text-xl mt-3 mb-2">Edit Profil</span>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 sm:col-span-4 lg:col-span-3 order-last sm:order-first">
                <div class="bg-white w-full p-2 pb-3 rounded-md mb-2">
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-44 w-44" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <button @click.prevent="profiledit()" class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-2 rounded-full">
                            Ubah Foto
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-span-12 sm:col-span-8 lg:col-span-9">
                <div class="bg-white w-full p-3 rounded-lg mb-2.5">
                    <span class="font-bold text-base text-primary">{{ user.nama }}</span>
                    <form name="form" action="/profil/edit" method="POST">
                        <div class="form-group row"><label class="col-sm-2 col-form-label">No WA</label>
                            <div class="col-sm-10">
                                <input name="nowa" type="text" class="form-control" placeholder="Masukkan No WA">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat Kos</label>
                            <div class="col-sm-10">
                                <input name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat Kos">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="password" type="text" class="form-control" placeholder="Masukkan Password">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ulangi Password</label>
                            <div class="col-sm-10">
                                <input name="upassword" type="text" class="form-control" placeholder="Ulangi Masukkan Password">
                            </div>
                        </div>

                        <div class="form-group row flex justify-end">
                            <button @click.prevent="simpan()" class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-2 rounded-lg mr-3">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['user'],
    mounted() {
        console.log(this.user)
    },
    methods: {
        profiledit() {
            this.$router.push({
                path: '/user/profil/edit'
            })
        },
        simpan(){}
    }
}
</script>
