<template>
    <v-card flat>
        <v-form v-model="valid" @submit.prevent="storeTour">
            <v-card-text class="pa-4">
                <v-container>
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
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="grey darken-3" text small @click="cancel">Back</v-btn>
                <v-btn color="primary" small rounded type="submit">Add Tour Dates</v-btn>
            </v-card-actions>
        </v-form>
    </v-card>
</template>

<script>
export default {
    name: "TourForm",
    data () {
        return {
            valid: false,
            tour: {
                name: '',
                itenary: '',
                status: 0,
                url: 'tours'
            },
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
        storeTour : function () {
            this.$store.dispatch("POST_API", this.tour)
            .then(response => {
                this.$emit('onFinish', response.data)
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