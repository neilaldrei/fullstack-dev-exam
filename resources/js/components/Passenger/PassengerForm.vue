<template>
    <v-card height="100%">
        <v-card>
            <v-form @submit.prevent="storePassenger">
            <v-card-title class="text-h5 grey lighten-2">
                Create new booking
            </v-card-title>

            <v-card-text class="pa-4">
                <v-row>
                    <v-col
                        cols="6"
                    >
                        <v-text-field
                        label="Given Name*"
                        :rules="baseRules"
                        v-model="passenger.given_name"
                        required
                        outlined
                        dense
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="6"
                    >
                        <v-text-field
                        label="Surname*"
                        :rules="baseRules"
                        v-model="passenger.surname"
                        required
                        outlined
                        dense
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="6"
                    >
                        <v-text-field
                        label="Email*"
                        :rules="emailRules"
                        v-model="passenger.email"
                        required
                        outlined
                        dense
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="6"
                    >
                        <v-text-field
                        label="Mobile*"
                        :rules="baseRules"
                        v-model="passenger.mobile"
                        required
                        outlined
                        dense
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                    >
                        <v-text-field
                        label="Passport*"
                        :rules="baseRules"
                        v-model="passenger.passport"
                        required
                        outlined
                        dense
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="6"
                    >
                        <p>Birth Date</p>
                        <v-date-picker
                            v-model="passenger.birth_date"
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
                            :rules="[v => v != null || 'Item is required']"
                            v-model="passenger.status"
                            required
                            outlined
                            dense
                        ></v-select>
                    </v-col>

                    <v-col
                        cols="12"
                    >
                        <v-textarea
                            label="Special Request*"
                            :rules="baseRules"
                            v-model="passenger.special_request"
                            required
                            outlined
                            dense
                            ></v-textarea>
                    </v-col>
                </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text color="grey darken-3" @click="$emit('onClose')">Close</v-btn>
                <v-btn color="primary" class="rounded-lg" type="submit">
                    Book
                </v-btn>
            </v-card-actions>
        </v-form>
        </v-card>
    </v-card>
</template>

<script>
export default {
    name: "PassengerForm",
    props: ['booking'],
    data () {
        return {
            passenger: {
                given_name: '',
                surname: '',
                email: '',
                mobile: '',
                passport: '',
                birth_date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                status: '',
                url: 'passengers',
                special_request: ''
            },
            statuses: [
                { text: "Disabled", value: 0 },
                { text: "Enabled", value: 1 },
            ],
            baseRules: [
                v => !!v || 'This field is required',
                v => (v && v.length >= 2) || 'This field must be more than 2 characters',
            ],
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
        }
    },

    methods: {
        storePassenger : function () {
            this.$store.dispatch('POST_API', {
                booking_id: this.booking.id,
                ...this.passenger
            })
            .then(response => {
                this.$emit('onClose')
            })
            .catch(err => {

            })
        },
    },

    computed: {

    }
}
</script>

<style>

</style>