<template>
    <div class="w-full bg-white rounded-xl p-2.5">
        <div class="border-2 border-gray-300 p-4 rounded-xl">
            <form @submit.prevent="login()">
                <label class="text-birumateri font-semibold text-base"
                    >Email</label
                >
                <input
                    v-model="user.email"
                    type="text"
                    class="w-full p-1.5 bg-white border-2 border-birumateri rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                />

                <label class="text-birumateri font-semibold text-base mt-3"
                    >Password</label
                >
                <input
                    v-model="user.password"
                    type="password"
                    class="w-full p-1.5 bg-white border-2 border-birumateri rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                />

                <div class="flex justify-center items-end m-3">
                    <button
                        class="bg-birumateri py-1.5 px-3 rounded-md text-white font-semibold text-base"
                    >
                        Masuk
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-between">
                <hr class="w-full" />
                <span class="mx-2 font-thin italic">atau</span>
                <hr class="w-full" />
            </div>

            <div class="flex justify-center items-end m-3">
                <router-link
                    to="/register"
                    class="bg-yellow-500 py-1.5 px-3 rounded-md text-white font-semibold text-base"
                    >Daftar</router-link
                >
            </div>
            <!--
        <div class="flex justify-center mt-3">
            <svg fill="currentColor" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-6 w-6 mx-2">
                <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"></path>
                <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"></path>
                <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"></path>
                <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"></path>
            </svg>
        </div> -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        login() {
            if (this.user.email != "" && this.user.password != "") {
                axios.post("/login", this.user).then((response) => {
                    console.log(response.data);
                    if (response.data == "Tidak terdaftar") {
                        this.$swal("Email belum terdaftar");
                    } else if (response.data == "Password salah") {
                        this.$swal("Password salah");
                    } else {
                        this.$swal({
                            text: "Berhasil masuk ...",
                            icon: "success",
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 4000,
                        });
                        window.location.href = response.data;
                    }
                });
            } else {
                this.$swal("Email atau Password tidak boleh kosong");
            }
        },
    },
};
</script>
