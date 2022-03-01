
window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter);

const Beranda = require('../pages/Beranda.vue').default;
const Forum = require('../pages/Forum.vue').default;
const Materi = require('../pages/Materi.vue').default;
// const ArsipSoal = require('../pages/ArsipSoal.vue').default;

const MateriD3Statistika = require('../pages/materi/D3-Statistika').default;
const MateriD4KomputasiStatistik = require('../pages/materi/D4-KomputasiStatistik').default;

const ArsipSoalD4KomputasiStatistik = require('../pages/arsipSoal/D4-KomputasiStatistik.vue').default;


const MateriD4KS = require('../pages/materi/D4KS/Materi.vue').default;
const MateriD4KSLihat = require('../pages/materi/D4KS/D4KSLihat.vue').default;


const ArsipSoalD4KS = require('../pages/arsipSoal/D4KS/D4KS.vue').default;
const ArsipSoalD4KSLihat = require('../pages/arsipSoal/D4KS/D4KSLihat.vue').default;


const routes = [
    {
        path: '/',
        component: Beranda
    },
    {
        path: '/forum',
        component: Forum
    },
    {
        path: '/materi',
        component: Materi
    },

    // untuk materi
    {
        path: '/materi/d4-komputasi-statistik/:mid/:imid',
        component: MateriD4KSLihat,
        props: true
    },

    // ini untuk Prodi D4 Komputasi Statistik
    {
        path: '/daftarmateri/d3-statistika',
        component: MateriD3Statistika
    },
    {
        path: '/daftarmateri/d4-komputasi-statistik',
        component: MateriD4KS
    },
    {
        path: '/daftararsipsoal/d4-komputasi-statistik',
        component: ArsipSoalD4KS
    },
    {
        path: '/arsipsoal/d4-komputasi-statistik/:mid/:dasid',
        component: ArsipSoalD4KSLihat,
        props: true
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;