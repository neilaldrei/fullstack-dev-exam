<template>
    <v-dialog
        v-model="dialog"
        fullscreen
        >
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                class="rounded-lg"
                small
                color="primary"
                dark
                v-bind="attrs"
                v-on="on"
            >
                New Tour
            </v-btn>
        </template>

        <v-card flat color="white">
            <v-card-title>
                <span class="text-h5">Create a new Tour</span>
            </v-card-title>

            <v-card-text>
                <v-stepper v-model="stepper">
                    <v-stepper-header>
                        <v-stepper-step
                            :complete="stepper > 1"
                            step="1">
                            Tour Details
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step
                            :complete="stepper > 2"
                            step="2">
                            Tour Dates
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step step="3">
                            Review
                        </v-stepper-step>
                    </v-stepper-header>

                    <v-stepper-items>
                        <v-stepper-content step="1">
                            <tour-form @onFinish="tourStoredHandler" @onCancel="cancelHandler"></tour-form>
                        </v-stepper-content>

                        <v-stepper-content step="2">
                            <tour-date-form 
                                @onFinish="tourDateStoredHandler" 
                                @onCancel="cancelHandler"
                                :tour-id="tourId">
                            </tour-date-form>
                        </v-stepper-content>

                        <v-stepper-content step="3">
                            <v-card v-if="stepper === 3" class="mb-4">
                                <v-card-text class="pa-4">
                                    <h1 class="overline">Tour Details</h1>
                                    <p class="caption">{{ tour.name }}</p>
                                    <p class="caption">{{ tour.itenary }}</p>
                                    <v-divider></v-divider>

                                    <h1 class="overline">Tour Date Details</h1>
                                    <div class="caption" v-for="item in tourDates.dates" :key="item">
                                        {{ item }} - {{ tourDates.status === 0 ? 'Enable' : 'Disabled' }}
                                    </div>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="primary" small rounded @click="finishHandler">Finish</v-btn>
                                    <v-btn color="grey darken-3" text small @click="cancelHandler">Back</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-stepper-content>
                    </v-stepper-items>
                </v-stepper>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script>
import TourForm from './TourForm.vue'
import TourDateForm from './TourDateForm.vue';

export default {
    name: "NewTour",
    data () {
        return {
            tourId: null,
            dialog: true,
            stepper: 1,
            tour: null,
            tourDates: null,
        }
    },

    methods: {
        tourStoredHandler : function (payload) {
            this.tourId = payload.id;
            this.stepper = 2

            this.tour = payload;
        },

        tourDateStoredHandler : function (payload) {
            this.stepper = 3
            this.tourDates = payload;
        },

        cancelHandler : function () {
            this.stepper > 1 && this.stepper <= 3 ? this.stepper-- : this.dialog = false;
        },

        finishHandler : function () {
            this.stepper = 1;
            this.dialog = false;
        }
    },

    components: {
        TourForm,
        TourDateForm
    }
}
</script>

<style>

</style>