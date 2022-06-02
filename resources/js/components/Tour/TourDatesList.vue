<template>
    <v-simple-table>
        <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">
                        Date
                    </th>
                </tr>
            </thead>
            
            <tbody>
                <tr v-for="item in tourDates" :key="item.id">
                    <td>{{ item.date }}</td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>

<script>
export default {
    name: "tourDatesList",
    props: ['tourDates'],
}
</script>

<style>

</style>