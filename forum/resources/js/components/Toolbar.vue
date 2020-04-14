<template>
    <v-toolbar>
        <v-toolbar-title>Personal Forum</v-toolbar-title>
        <v-spacer></v-spacer>
        <div v-for="item in items" :key="item.title" class="hidden-sm-and-down">
            <router-link
                :to="item.to"
                v-if="item.show"
            >
                <v-btn flat color="primary">{{ item.title }}</v-btn>
            </router-link>
        </div>
    </v-toolbar>
</template>

<script>
    export default {
        name: "Toolbar",
        data() {
            return {
                items: [
                    {title: 'Forum', to: '/forum', show: true},
                    {title: 'Ask Question', to: '/ask', show: User.loggedIn()},
                    {title: 'Category', to: '/category', show: User.loggedIn()},
                    {title: 'Login', to: '/login', show: !User.loggedIn()},
                    {title: 'Logout', to: '/logout', show: User.loggedIn()},
                ]
            }
        },
        created() {
            EventBus.$on('logout', () => {
                User.logout();
            })
        }
    }
</script>

