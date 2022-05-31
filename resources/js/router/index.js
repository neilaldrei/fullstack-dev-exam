import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Main View
import AdminPanel from '../components/UIs/AdminPanel';

// Landing Page
import Home from '../views/Home';

const ROUTER = new VueRouter({
    linkExactActiveClass: 'active',
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: 'Home',
            component: AdminPanel,
            children: [
                {
                    path: '/',
                    name: 'Home',
                    component: Home
                }
            ]
        }
    ]
});

export default ROUTER