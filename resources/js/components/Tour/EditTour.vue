<template>
    <v-dialog scrollable v-model="dialog" width="800">
        <template v-slot:activator="{ on, attrs }">
            <v-btn v-on="on" v-bind="attrs" icon small color="warning"><v-icon small>mdi-pencil</v-icon></v-btn>
        </template>

        <v-card>
            <v-card-title class="text-h5 grey lighten-2">
                Edit {{ tour.name }}
            </v-card-title>

            <v-card-text class="pa-4">
                <v-row>
                        <v-col
                            cols="6"
                        >
                            <v-text-field
                            label="Name*"
                            :rules="rules"
                            v-model="tour.name"
                            required
                            outlined
                            dense
                            ></v-text-field>
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
                                v-model="tour.status"
                                required
                                outlined
                                dense
                            ></v-select>
                        </v-col>

                        <v-col
                            cols="12">
                            <v-textarea
                                label="Itenary*"
                                v-model="tour.itenary"
                                :rules="rules"
                                required
                                no-resize
                                outlined
                                dense
                            ></v-textarea>
                        </v-col>
                    </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text color="grey darken-3" @click="dialog = false">Close</v-btn>
                <v-btn color="primary" class="rounded-lg" @click="updateTour">
                    Update
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: "EditTour",
    props: ['item'],
    data () {
        return {
            dialog: false,
            statuses: [
                { text: "Draft", value: 0 },
                { text: "Public", value: 1 },
            ],
            rules: [
                v => !!v || 'This field is required',
                v => (v && v.length >= 2) || 'This field must be more than 2 characters',
            ],
        }
    },

    methods: {
        updateTour : function () {

            this.$store.dispatch("UPDATE_API", {
                url: `tours/${this.item.id}`,
                ...this.tour,
            })
            .then(response => {
                this.dialog = false;
            })
            .catch(err => {
                
            })

        }
    },

    computed: {
        tour () {
            if (this.item != null) {
                
                return {
                    name: this.item.name,
                    status: this.item.status,
                    itenary: this.item.itenary
                }
            } else {
                return {
                    name: '',
                    status: '',
                    itenary: ''
                }
            }
        }
    },
}
</script>

<style>

</style>