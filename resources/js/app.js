
require('./bootstrap');

window.Vue = require('vue').default;
import router from './router';

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('sidebaradmin-component', require('./components/SidebarAdminComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});