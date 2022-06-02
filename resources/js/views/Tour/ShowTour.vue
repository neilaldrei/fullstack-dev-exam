<template>
    <v-container>
        <v-card-title>
            <v-btn icon color="grey darken-3" to="/"><v-icon>mdi-arrow-left</v-icon></v-btn>

            <v-spacer></v-spacer>

            <new-booking v-if="tour != null && tour.tourDates.length" :dates="tour.tourDates" :tour-id="tour.id"></new-booking>
        </v-card-title>
        <v-card v-if="tour != null">
            <v-card-text class="pa-4">
                <v-row>
                    <v-col cols="8">
                        <h1 class="text-center mb-5">{{ tour.name }}</h1>
                        <p class="text-center mb-8">{{ tour.itenary }}</p>
                    </v-col>

                    <v-col cols="4" v-if="tour.tourDates.length">
                        <h1>Tour Dates</h1>
                        <tour-dates-list :tour-dates="tour.tourDates"></tour-dates-list>
                    </v-col>

                    <v-col cols="4" v-else>
                        <h3 class="text-center">No Public Tour Dates Available</h3>
                    </v-col>
                </v-row>
            </v-card-text>

            <v-card-text class="pa-4" v-if="tour.bookings.length">
                <h1>Bookings</h1>
                <booking-list :bookings="tour.bookings"></booking-list>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
import TourDatesList from '../../components/Tour/TourDatesList.vue';
import NewBooking from '../../components/Booking/NewBooking.vue';
import BookingList from '../../components/Booking/BookingList.vue';

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
        TourDatesList,
        NewBooking,
        BookingList,
    }
}
</script>

<style>

</style>