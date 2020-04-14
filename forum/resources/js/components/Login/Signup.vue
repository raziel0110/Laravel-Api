<template>
    <v-container>
        <v-layout class="mx-3">

            <h2 class="headline">Login</h2>

        </v-layout>


        <v-layout>
            <v-flex>
                <v-card class="ma-3">
                    <v-form @submit.prevent="signup()" class="pa-3" flat>
                        <v-text-field
                            label="Name"
                            v-model="form.name"
                            type="text"
                            required
                            class="mx-0"
                        ></v-text-field>
                        <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>


                        <v-text-field
                            label="Email"
                            v-model="form.email"
                            type="email"
                            required
                            class="mx-0"
                        ></v-text-field>
                        <span class="red--text" v-if="errors.email">{{ errors.email[0] }}</span>

                        <v-text-field
                            label="Password"
                            v-model="form.password"
                            type="password"
                            required
                            class="mx-0"
                        ></v-text-field>
                        <span class="red--text" v-if="errors.password">{{ errors.password[0] }}</span>

                        <v-text-field
                            label="Re-type password"
                            v-model="form.password_confirmation"
                            type="password"
                            required
                            class="mx-0"
                        ></v-text-field>

                        <v-btn color="success" type="submit" class="mx-0">Signup</v-btn>

                        <router-link to="/login">
                            <v-btn flat color="primary">Login</v-btn>
                        </router-link>
                    </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Signup",
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                },
                errors: {}
            }
        },
        created() {
            if(User.loggedIn()) {
                this.$router.push({name:'Forum'});
            }
        },
        methods: {
            signup() {
                axios.post('/api/auth/signup', this.form)
                    .then(res => {
                        User.responseAfterLogin(res);
                        this.$router.push({name: 'Forum'})
                    })
                    .catch(err => {
                        this.errors = err.response.data.errors
                    });
            }
        }
    }
</script>

<style scoped>

</style>
