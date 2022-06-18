window.Vue = require("vue").default;

import VueRouter from "vue-router";
Vue.use(VueRouter);

const Register = require("../auth/Register.vue").default;
const Login = require("../auth/Login.vue").default;
const LoginGagal = require("../auth/LoginGagal.vue").default;

// Bagian Admin
const AdminLogin = require("../admin/auth/Login.vue").default;

const AdminBeranda = require("../admin/Beranda.vue").default;
const AdminThread = require("../admin/Thread.vue").default;
const AdminThreadLihat = require("../admin/ThreadLihat.vue").default;
const AdminTanggapan = require("../admin/Tanggapan.vue").default;
const AdminTanggapanLihat = require("../admin/TanggapanLihat.vue").default;
const AdminLaporan = require("../admin/Laporan.vue").default;
const AdminAkun = require("../admin/Akun.vue").default;

// Bagian User
const UserBeranda = require("../user/Beranda.vue").default;
const UserBuatThread = require("../user/BuatThread.vue").default;
const UserBuatThreadDraft = require("../user/BuatThreadDraft.vue").default;
const UserPetunjuk = require("../user/Petunjuk.vue").default;
const UserProfil = require("../user/Profil.vue").default;
const UserProfilEdit = require("../user/ProfilEdit.vue").default;
const UserProfilPenggunaLain = require("../user/ProfilPenggunaLain.vue").default;
const UserTanggapi = require("../user/Tanggapi.vue").default;
const UserPengguna = require("../user/Pengguna.vue").default;

const routes = [
    {
        path: "/",
        component: Login,
    },
    {
        path: "/login",
        component: Login,
    },
    {
        path: "/login/gagal",
        component: LoginGagal,
    },
    {
        path: "/register",
        component: Register,
    },

    {
        path: "/user",
        component: UserBeranda,
    },
    {
        path: "/user/petunjuk",
        component: UserPetunjuk,
    },
    {
        path: "/user/buat_thread",
        component: UserBuatThread,
    },
    {
        path: "/user/buat_thread/:idd",
        component: UserBuatThreadDraft,
        props: true,
    },
    {
        path: "/user/profil",
        component: UserProfil,
    },
    {
        path: "/user/profil/edit",
        component: UserProfilEdit,
    },
    {
        path: "/user/profil/:nim",
        component: UserProfilPenggunaLain,
        props: true
    },
    {
        path: "/user/tanggapi/:idt",
        component: UserTanggapi,
        props: true,
    },
    {
        path: "/user/pengguna",
        component: UserPengguna,
    },


    // untuk admin
    {
        path: "/admin/login",
        component: AdminLogin,
    },
    {
        path: "/admin",
        component: AdminBeranda,
    },
    {
        path: "/admin/thread",
        component: AdminThread,
    },
    {
        path: "/admin/tanggapan",
        component: AdminTanggapan,
    },
    {
        path: "/admin/laporan",
        component: AdminLaporan,
    },
    {
        path: "/admin/thread",
        component: AdminThread,
    },
    {
        path: "/admin/thread/:idt",
        component: AdminThreadLihat,
        props: true,
    },
    {
        path: "/admin/tanggapan",
        component: AdminTanggapan,
    },
    {
        path: "/admin/tanggapan/:idt/:ktg",
        component: AdminTanggapanLihat,
        props: true,
    },
    {
        path: "/admin/laporan",
        component: AdminLaporan,
    },
    {
        path: "/admin/kelolaakun",
        component: AdminAkun,
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
});

export default router;
