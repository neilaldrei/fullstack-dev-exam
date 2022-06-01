<template>
    <v-card flat>
        <v-form @submit.prevent="storeTourDate">
            <v-card-text class="pa-4">
                <v-container>
                    <v-row>
                        <v-col
                            cols="12"
                        >
                            <v-date-picker
                                v-model="tourDate.dates"
                                show-current
                                full-width
                                multiple
                            ></v-date-picker>
                        </v-col>

                        <v-col
                            cols="6"
                        >
                            <v-select
                                :items="statuses"
                                item-text="text"
                                item-value="value"
                                label="Status*"
                                v-model="tourDate.status"
                                required
                                outlined
                                dense
                            ></v-select>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="grey darken-3" text small @click="cancel">Back</v-btn>
                <v-btn color="primary" small rounded type="submit">Review</v-btn>
            </v-card-actions>
        </v-form>
    </v-card>
</template>

<script>
export default {
    name: "TourDateForm",
    props: ['tourId'],
    data () {
        return {
            tourDate: {
                dates: [(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)],
                status: 0,
                url: 'tour-dates'
            },
            statuses: [
                { text: "Disabled", value: 0 },
                { text: "Enabled", value: 1 },
            ]
        }
    },
    
    methods: {
        storeTourDate : function () {

            this.$store.dispatch("POST_API", {
                tour_id: this.tourId,
                ...this.tourDate
            })
            .then(response => {
                this.$emit('onFinish', this.tourDate)
            })
            .catch (err => {

            })
        },

        cancel : function () {
            this.$emit('onCancel')
        }
    }
}
</script>

<style>

</style>