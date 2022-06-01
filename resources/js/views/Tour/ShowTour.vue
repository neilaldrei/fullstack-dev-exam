<template>
    <v-container>
        <v-card-title>
            <v-btn icon color="grey darken-3" to="/"><v-icon>mdi-arrow-left</v-icon></v-btn>
        </v-card-title>
        <v-card v-if="tour != null">
            <v-card-text class="pa-4">
                <h1 class="text-center mb-5">{{ tour.name }}</h1>
                <p class="text-center mb-8">{{ tour.itenary }}</p>
                <h1>Tour Dates</h1>
                <tour-dates-list :tour-dates="tour.tourDates"></tour-dates-list>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
import TourDatesList from '../../components/Tour/TourDatesList.vue';

export default {
    name: "ShowTour",
    data () {
        return {

        }
    },

    methods: {
        fetchTour : function () {

            this.$store.dispatch("SHOW_API", {
                url: `tours/${this.$route.params.id}`
            })

        }
    },

    computed: {
        tour : function () {
            return this.$store.getters.ITEM
        }
    },

    created () {
        this.fetchTour();
    },

    components: {
        TourDatesList
    }
}
</script>

<style>

</style>