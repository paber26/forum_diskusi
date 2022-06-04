
window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter);

const Register = require('../auth/Register.vue').default;
const Login = require('../auth/Login.vue').default;

// Bagian Admin
const Beranda = require('../pages/admin/Beranda.vue').default;
const Thread = require('../pages/admin/Thread.vue').default;
const Tanggapan = require('../pages/admin/Tanggapan.vue').default;
const Laporan = require('../pages/admin/Laporan.vue').default;

const Forum = require('../pages/forum/Index.vue').default;
const ForumTambah = require('../pages/forum/Tambah.vue').default;
const ForumJawab = require('../pages/forum/Jawab.vue').default;

const MateriD3 = require('../pages/materi/D3.vue').default;
const MateriD4ST = require('../pages/materi/D4ST.vue').default;
const MateriD4KS = require('../pages/materi/D4KS.vue').default;

const MateriLihat = require('../pages/materi/Lihat.vue').default;

const ArsipSoalD3 = require('../pages/arsipsoal/D3.vue').default;
const ArsipSoalD4ST = require('../pages/arsipsoal/D4ST.vue').default;
const ArsipSoalD4KS = require('../pages/arsipsoal/D4KS.vue').default;

const ArsipSoalLihat = require('../pages/arsipSoal/Lihat.vue').default;
const ArsipSoalJawab = require('../pages/arsipSoal/Jawab.vue').default;

// const ArsipSoalD4KS = require('../pages/arsipSoal/D4KS/D4KS.vue').default;


const routes = [
    {
        path: '/login',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },
    
    
    {
        path: '/',
        component: Beranda
    },
    {
        path: '/thread',
        component: Thread
    },
    {
        path: '/tanggapan',
        component: Tanggapan
    },
    {
        path: '/laporan',
        component: Laporan
    },



    {
        path: '/forum',
        component: Forum
    },
    {
        path: '/forum/tambah',
        component: ForumTambah
    },
    {
        path: '/forum/:fid',
        component: ForumJawab,
        props: true
    },
    
    {
        path: '/daftarmateri/d3',
        component: MateriD3,
    },
    {
        path: '/daftarmateri/d4st',
        component: MateriD4ST,
    },
    {
        path: '/daftarmateri/d4ks',
        component: MateriD4KS,
    },
    {
        path: '/materi/:prodi/:mid/:imid',
        component: MateriLihat,
        props: true
    },

    {
        path: '/daftararsipsoal/d3',
        component: ArsipSoalD3,
    },
    {
        path: '/daftararsipsoal/d4st',
        component: ArsipSoalD4ST,
    },
    {
        path: '/daftararsipsoal/d4ks',
        component: ArsipSoalD4KS,
    },
    {
        path: '/arsipsoal/:prodi/:mid/:dasid',
        component: ArsipSoalLihat,
        props: true
    },
    {
        path: '/arsipsoal/:prodi/:mid/:dasid/:asid',
        component: ArsipSoalJawab,
        props: true
    },

    // {
    //     path: '/daftararsipsoal/d4-komputasi-statistik',
    //     component: ArsipSoalD4KS
    // },
    // {
    //     path: '/arsipsoal/d4-komputasi-statistik/:mid/:dasid',
    //     component: ArsipSoalD4KSLihat,
    //     props: true
    // },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;