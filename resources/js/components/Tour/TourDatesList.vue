<template>
    <v-simple-table>
        <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">
                        Date
                    </th>
                    <th class="text-right">
                        Actions
                    </th>
                </tr>
            </thead>
            
            <tbody>
                <tr v-for="item in tourDates" :key="item.id">
                    <td>{{ item.date }}</td>
                    <td class="text-right">
                        <v-btn color="primary" rounded outlined small :disabled="!item.status">Book</v-btn>
                    </td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>

<script>
export default {
    name: "tourDatesList",
    props: ['tourDates'],
    methods: {

    },

    computed : {

    }
}
</script>

<style>

</style>