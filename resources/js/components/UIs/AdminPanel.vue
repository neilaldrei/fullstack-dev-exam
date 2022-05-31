<template>
    <v-app>
        <nav-bar></nav-bar>

        <nav-drawer></nav-drawer>

        <v-main class="grey lighten-3">
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
import NavDrawer from './NavDrawer.vue'
import NavBar from './NavBar'

export default {
    name: "AdminPanel",
    data () {
        return {

        }
    },

    components: {
        'nav-bar': NavBar,
        'nav-drawer': NavDrawer
    }
}
</script>

<style>

</style>