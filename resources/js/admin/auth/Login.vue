<template>
<div class="w-full bg-white rounded-xl p-2.5">
    <div class="border-2 border-gray-300 p-4 rounded-xl">
        <div class="flex justify-center flex-col">
            <span class="font-bold text-center text-3xl text-birumateri">Forum Diskusi</span>
            <hr class="my-2">
        </div>
        <form @submit.prevent="login()">
            <label class="text-birumateri font-semibold text-base">Email</label>
            <input v-model="user.email" type="text" class="w-full p-1.5 bg-white border-2 border-birumateri rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

            <label class="text-birumateri font-semibold text-base mt-3">Password</label>
            <input v-model="user.password" type="password" class="w-full p-1.5 bg-white border-2 border-birumateri rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

            <div class="flex justify-center items-end m-3">
                <button class="bg-birumateri py-1.5 px-3 rounded-md text-white font-semibold text-base">Masuk</button>
            </div>
        </form>

        <div class="flex items-center justify-between">
            <hr class="w-full">
            <span class="mx-2 font-thin italic">atau</span>
            <hr class="w-full">
        </div>

        <div class="flex justify-center items-end m-3 bg-red-600 py-1.5 px-3 rounded-md">
            <img src="/img/google.svg" class="h-6 w-6 bg-white mr-2">
            <a href="/auth/redirect" class="text-white font-semibold text-base">Masuk dengan Google</a>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            user: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login() {
            if ((this.user.email != '') && (this.user.password != '')) {
                axios.post('/admin/login', this.user).then(response => {
                    console.log(response.data)
                    if (response.data == "Tidak terdaftar") {
                        this.$swal('Email belum terdaftar')
                    } else if (response.data == "Password salah") {
                        this.$swal('Password salah')
                    } else {
                        this.$swal({
                            text: 'Berhasil masuk ...',
                            icon: 'success',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 4000
                        })
                        window.location.href = response.data
                    }
                })
            } else {
                this.$swal('Email atau Password tidak boleh kosong')
            }
        }
    }

}
</script>
