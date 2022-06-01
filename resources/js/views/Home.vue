<template>
    <v-container>
        <tour-list></tour-list>
    </v-container>
</template>

<script>
import TourList from '../components/Tour/TourList.vue'

export default {
    name: "Home",
    data () {
        return {
            
        }
    },

    components: {
        'tour-list': TourList
    }
}
</script>

<style>

</style>