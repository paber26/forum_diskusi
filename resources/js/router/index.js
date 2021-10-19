
window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter);

const Beranda = require('../pages/Beranda.vue').default;
const Modul = require('../pages/Modul.vue').default;
// const ArsipSoal = require('../pages/ArsipSoal.vue').default;

const ModulD3Statistika = require('../pages/modul/D3-Statistika').default;
const ModulD4KomputasiStatistik = require('../pages/modul/D4-KomputasiStatistik').default;

const ArsipSoalD4KomputasiStatistik = require('../pages/arsipSoal/D4-KomputasiStatistik.vue').default;

const routes = [
    {
        path: '/',
        component: Beranda
    },
    {
        path: '/modul',
        component: Modul
    },
    {
        path: '/listmodul/d3-statistika',
        component: ModulD3Statistika
    },
    {
        path: '/listmodul/d4-komputasi-statistik',
        component: ModulD4KomputasiStatistik
    },
    {
        path: '/listarsipsoal/d4-komputasi-statistik',
        component: ArsipSoalD4KomputasiStatistik
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;