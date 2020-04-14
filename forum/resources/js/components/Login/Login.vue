<template>
    <v-container>
        <v-layout class="mx-3">

                <h2 class="headline">Login</h2>

        </v-layout>


        <v-layout>
            <v-flex >
                <v-card class="ma-3">
                    <v-form @submit.prevent="login" class="pa-3" flat>
                        <v-text-field
                            label="Email"
                            v-model="form.email"
                            type="email"
                            required
                            class="mx-0"
                        ></v-text-field>

                        <v-text-field
                            label="Password"
                            v-model="form.password"
                            type="password"
                            required
                            class="mx-0"
                        ></v-text-field>

                        <v-btn color="success" type="submit" class="mx-0">Login</v-btn>

                        <router-link to="/signup">
                            <v-btn flat color="primary">Sign Up</v-btn>
                        </router-link>
                    </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                form: {
                    email: null,
                    password: null
                },
            }
        },
        created() {
            if(User.loggedIn()) {
                this.$router.push({name:'Forum'});
            }
        },
        methods: {
           login() {
                User.login(this.form);
                // this.$router.push({name:'Forum'});
            }
        }
    }
</script>

<style>

</style>
