import '@mdi/font/css/materialdesignicons.css';
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

export default new Vuetify({
    icons: {
        iconfont: 'mdi',
    },
    theme: {
        dark: false,
        themes: {
            light: {
                primary: '#50C878',
                secondary: '#4CAF50',
                accent: '#FF7D62',
            },
            dark: {
                primary: '#50C878',
                secondary: '#4CAF50',
                accent: '#FF7D62',
            }
        },
    }
});