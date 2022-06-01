<template>
    <v-card>
        <v-form @submit.prevent="storeBooking">
            <v-card-title class="text-h5 grey lighten-2">
                Create new booking | Choose Tour Date
            </v-card-title>

            <v-card-text class="pa-4">
                <v-row>

                    <v-col
                        cols="12"
                    >
                        <v-select
                            :items="dates"
                            item-text="date"
                            item-value="date"
                            label="Tour Dates*"
                            placeholder="Please Choose Tour Date"
                            :rules="[v => v != null || 'Item is required']"
                            v-model="booking.tour_date"
                            required
                            outlined
                            dense
                        ></v-select>
                    </v-col>
                </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text color="grey darken-3" @click="$emit('onClose')">Close</v-btn>
                <v-btn color="primary" class="rounded-lg" type="submit">
                    Submit
                </v-btn>
            </v-card-actions>
        </v-form>
    </v-card>
</template>

<script>

export default {
    name: "BookingForm",
    props: ['dates', 'tourId'],
    data () {
        return {
            booking: {
                tour_date: '',
                status: 0,
                url: 'bookings'
            },
        }
    },

    methods: {
        storeBooking : function () {
            this.$store.dispatch('POST_API', {
                tour_id: this.tourId,
                ...this.booking
            })
            .then(response => {
                this.$emit('onFinish', response.data)
            })
        },
    },

    computed: {

    }
}
</script>

<style>

</style>