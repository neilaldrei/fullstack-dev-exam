<template>
    <v-container fluid>
        <v-row>
            <v-col cols="3">
                <v-card color="primary lighten-4" dark>
                    <v-card-text class="pa-4">
                        <v-list color="transparent" dense>
                            <v-list-item-group color="primary">
                                <v-list-item
                                    v-for="item in bookings"
                                    :key="item.id" link @click="booking = item">
                                    <v-list-item-content>
                                        <v-list-item-title>Booking # {{ item.id }} - {{ item.date }}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list-item-group>
                        </v-list>
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col cols="8" v-if="booking.passengers.length">
                <v-card flat>
                    <v-card-title>
                        <h4 class="overline" :class="booking.status === 2 ? 'terror--text' : booking.status === 1 ? 'success--text' : 'warning--text'">STATUS : {{ booking.status === 2 ? 'CANCELLED' : booking.status === 1 ? 'CONFIRMED' : 'SUBMITTED' }}</h4>
                        <v-spacer></v-spacer>
                        <v-btn small rounded @click="changeStatus(1)" color="success" class="mr-4">Accept</v-btn>
                        <v-btn small rounded @click="changeStatus(2)" color="error">Decline</v-btn>
                    </v-card-title>
                </v-card>

                <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-left">
                                    Passport
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Birth Date</th>
                                <th>Status</th>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr v-for="item in booking.passengers" :key="item.id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.passport }}</td>
                                <td>{{ item.given_name + ' ' + item.surname }}</td>
                                <td>{{ item.email }}</td>
                                <td>{{ item.mobile }}</td>
                                <td>{{ item.birth_date }}</td>
                                <td>{{ item.status === 0 ? 'Disabled' : 'Enabled' }}</td>
                                <td>
                                    <v-btn color="error" icon x-small @click="removePassenger(item.id)">
                                        <v-icon>mdi-delete</v-icon>
                                    </v-btn>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>

            <v-col v-else>
                <h3 class="text-center">
                    No Passengers
                </h3>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: "BookingList",
    props: ['bookings'],
    data () {
        return {
            booking: {
                status: '',
                passengers: []
            }
        }
    },

    methods: {
        changeStatus : function (status) {
            this.booking.status = status

            this.$store.dispatch("UPDATE_API", {
                url: `bookings/${this.booking.id}`,
                tour_date: this.booking.date,
                ...this.booking
            })

        },

        removePassenger : function (passengerId) {
            
            axios
            .delete(`/api/v1/bookings/${this.booking.id}/remove`, {
                passenger_id: passengerId
            })
            .then(response => {
                let i = this.booking.passengers.findIndex((item => item.id === response.data.id));

                this.booking.passengers.splice(i, 1);
            })
            .catch( err => {

            })

        },
    }
}
</script>

<style>

</style>