
window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter);

const Beranda = require('../pages/Beranda.vue').default;
const Modul = require('../pages/Modul.vue').default;

const routes = [
    {
        path: '/',
        component: Beranda
    },
    {
        path: '/modul',
        component: Modul
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;