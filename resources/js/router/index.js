
window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter);

const Register = require('../auth/Register.vue').default;
const Login = require('../auth/Login.vue').default;

// Bagian Admin
const AdminLogin = require('../admin/auth/Login.vue').default;

const AdminBeranda = require('../admin/Beranda.vue').default;
const AdminThread = require('../admin/Thread.vue').default;
const AdminThreadLihat = require('../admin/ThreadLihat.vue').default;
const AdminTanggapan = require('../admin/Tanggapan.vue').default;
const AdminTanggapanLihat = require('../admin/TanggapanLihat.vue').default;
const AdminLaporan = require('../admin/Laporan.vue').default;


// Bagian User
const UserBeranda = require('../user/Beranda.vue').default;
const UserBuatThread = require('../user/BuatThread.vue').default;
const UserBuatThreadDraft = require('../user/BuatThreadDraft.vue').default;
const UserPetunjuk = require('../user/Petunjuk.vue').default;
const UserProfil = require('../user/Profil.vue').default;
const UserProfilEdit = require('../user/ProfilEdit.vue').default;
const UserTanggapi = require('../user/Tanggapi.vue').default;

const routes = [
    {
        path: '/',
        component: Login
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },
    
    
    {
        path: '/user',
        component: UserBeranda
    },
    {
        path: '/user/petunjuk',
        component: UserPetunjuk
    },
    {
        path: '/user/buat_thread',
        component: UserBuatThread
    },
    {
        path: '/user/buat_thread/:idd',
        component: UserBuatThreadDraft,
        props: true
    },
    {
        path: '/user/profil',
        component: UserProfil
    },
    {
        path: '/user/profil/edit',
        component: UserProfilEdit
    },
    {
        path: '/user/tanggapi/:idt',
        component: UserTanggapi,
        props: true
    },

    {
        path: '/admin/login',
        component: AdminLogin
    },
    {
        path: '/admin',
        component: AdminBeranda
    },
    {
        path: '/admin/thread',
        component: AdminThread
    },
    {
        path: '/admin/tanggapan',
        component: AdminTanggapan
    },
    {
        path: '/admin/laporan',
        component: AdminLaporan
    },
    {
        path: '/admin/thread',
        component: AdminThread
    },
    {
        path: '/admin/thread/:idt',
        component: AdminThreadLihat,
        props: true
    },
    {
        path: '/admin/tanggapan',
        component: AdminTanggapan
    },
    {
        path: '/admin/tanggapan/:idt/:ktg',
        component: AdminTanggapanLihat,
        props: true
    },
    {
        path: '/admin/laporan',
        component: AdminLaporan
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;
