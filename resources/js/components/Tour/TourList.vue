<template>
    <v-card>
        <v-card-title>
            Tour List
            <v-spacer></v-spacer>
            <new-tour></new-tour>
        </v-card-title>
        <v-card-text class="pa-4">
            <v-data-table
                :headers="headers"
                :items="items"
                :items-per-page="5"
                class="elevation-1"
            >
                <template v-slot:[`item.name`]="props">
                    <v-tooltip right nudge-right color="grey darken-4">
                        <template v-slot:activator="{ attrs, on }">
                            <v-btn
                                class="text-capitalize text-truncate text-decoration-underline"
                                :to="`/tours/${props.item.name}/${props.item.id}`"
                                text
                                v-bind="attrs"
                                v-on="on"
                                color="blue darken-2"
                            >
                                <span>{{ props.item.name }}</span>
                            </v-btn>
                        </template>

                        <span class="font-weight-light caption">{{
                            `View ${props.item.name}`
                        }}</span>
                    </v-tooltip>
                </template>

                <template v-slot:[`item.status`]="props">
                    <v-chip x-small label :color="props.item.status === 0 ? 'error' : 'success'">{{ props.item.status === 0 ? 'Draft' : 'Public' }}</v-chip>
                </template>

                <template v-slot:[`item.actions`]="props">
                    <edit-tour :item="props.item"></edit-tour>
                    <v-btn icon small color="error" @click.prevent="removeTour(props.item.id)"><v-icon small>mdi-delete</v-icon></v-btn>
                </template>
            </v-data-table>
        </v-card-text>
    </v-card>
</template>

<script>
import NewTour from './NewTour.vue';
import EditTour from './EditTour.vue';

export default {
    name: "TourList",
    data () {
        return {
            headers: [
                { text: 'ID', value: 'id' },
                { text: 'Name', value: 'name' },
                { text: 'Itenaries', value: 'itenary' },
                { text: 'Status', value: 'status' },
                { text: 'Actions', sortable: false, value: 'actions' },
            ],
        }
    },

    created () {
        this.fetchList();
    },

    methods: {
        fetchList : function () {
            this.$store.dispatch('FETCH_API', {url: 'tours'});
        },

        removeTour : function (tourId) {
            this.$store.dispatch('DELETE_API', {url: `tours/${tourId}`})
        }
    },

    computed: {
        items: function () {
            return this.$store.getters.LIST
        }
    },

    components: {
        'new-tour': NewTour,
        'edit-tour': EditTour
    }
}
</script>

<style>

</style>