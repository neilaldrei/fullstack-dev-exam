<template>
    <v-dialog scrollable v-model="dialog" width="800">
        <template v-slot:activator="{ on, attrs }">
            <v-btn v-on="on" v-bind="attrs" color="primary" rounded elevation="8" large>Book</v-btn>
        </template>

        <booking-form v-if="!isFinishedChoosing" @onFinish="bookingFinishedHandler" @onClose="dialog = false" :dates="dates" :tour-id="tourId"></booking-form>        

        <passenger-form v-if="isFinishedChoosing" @onFinish="passengerFinishedHandler" @onClose="dialog = false" :booking="booking"></passenger-form>

        <v-snackbar top center color="primary" timeout="10000" v-model="status.snackbar">
            <p class="white--text">{{ status.text }}</p>

            <template v-slot:action="{ attrs }">
                <v-btn
                    color="grey darken-3"
                    text
                    v-bind="attrs"
                    @click="status.snackbar = false"
                    >
                    Close
                </v-btn>
            </template>
        </v-snackbar>
    </v-dialog>
</template>

<script>
import PassengerForm from '../Passenger/PassengerForm.vue';
import BookingForm from './BookingForm.vue';

export default {
    name: "newBooking",
    props: ['dates', 'tourId'],
    data () {
        return {
            dialog: false,
            isFinishedChoosing: false,
            status: {
                snackbar: false,
                text: ''
            },
            booking: {
                id: null,
                tour_date: null,
                status: null
            }
        }
    },

    methods: {
        bookingFinishedHandler : function (payload) {
            console.log(payload)
            this.booking = payload
            this.isFinishedChoosing = true;
        },

        passengerFinishedHandler : function () {

        }
    },

    computed: {
        
    },

    components: {
        BookingForm,
        PassengerForm
    }
}
</script>

<style>

</style>