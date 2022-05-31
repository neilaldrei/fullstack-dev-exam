require('./bootstrap');

import Vue from 'vue';
import router from './router';
import store from './store';
import vuetify from './plugins/vuetify.js';

new Vue({
    router,
    vuetify,
    store
}).$mount('#app')