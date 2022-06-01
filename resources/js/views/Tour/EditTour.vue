<template>
    <h1>Test</h1>
</template>

<script>
export default {
    name: "Edit Tour",
    data () {
        return {

        }
    },

    methods: {
        fetchTour : function () {

            this.$store.dispatch("SHOW_API", {
                url: `tours/${this.$route.params.id}`
            })

        }
    },

    computed: {
        
    },

    created () {
        this.fetchTour();
    }
}
</script>

<style>

</style>