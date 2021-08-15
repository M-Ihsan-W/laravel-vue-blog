require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import router from './router/route.js';

Vue.component('header-component', require('./components/users/Header.vue').default);
Vue.component('footer-component', require('./components/users/Footer.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});

