<template>
    <v-content>
        <toolbar-component></toolbar-component>

        <router-view></router-view>

        <footer-component></footer-component>
    </v-content>

</template>

<script>
    import Toolbar from "./Toolbar";
    import Footer from "./Footer";

    export default {
        name: "AppHome",
        components: {
            'toolbar-component': Toolbar,
            'footer-component': Footer,
        }
    }
</script>

<style scoped>

</style>
