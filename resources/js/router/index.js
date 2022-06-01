import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Main View
import AdminPanel from '../components/UIs/AdminPanel';

// Landing Page
import Home from '../views/Home';

// Tours
import ShowTour from "../views/Tour/ShowTour";

// Booking
// import Booking from "../views/Booking/"

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
                },
                {
                    path: '/tours/:name/:id',
                    name: "ShowTour",
                    component: ShowTour
                },
            ]
        }
    ]
});

export default ROUTER