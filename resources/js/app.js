require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router/route.js';
Vue.use(VueRouter);

Vue.component('header-component', require('./components/users/Header.vue').default);
Vue.component('footer-component', require('./components/users/Footer.vue').default);
Vue.component('admin-header', require('./components/admin/Header.vue').default);
Vue.component('admin-wrap', require('./components/admin/WrapContent.vue').default);
Vue.component('admin-navigation', require('./components/admin/Navigation.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});

