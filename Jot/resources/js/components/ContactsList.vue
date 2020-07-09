<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div v-if="contacts.length === 0">
                <p>No contacts. <router-link to="/contacts/create">Get Started.</router-link></p>
            </div>
            <div v-for="contact in contacts">
                <router-link :to="'/contacts/' +contact.data.contact_id"
                             class="flex items-center border-b border-gray-500 p-4 hover:bg-gray-100">
                    <user-circle :name="contact.data.name"></user-circle>
                    <div class="pl-4">
                        <p class="text-blue-400 font-bold">{{contact.data.name}}</p>
                        <p class="text-gray-600">{{contact.data.company}}</p>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import UserCircle from "../components/UserCircle";
    export default {
        name: "ContactsList",
        components:{
            UserCircle
        },
        props:[
            'endpoint'
        ],
        mounted() {
            axios.get(this.endpoint)
                .then(response => {
                    this.contacts = response.data.data;
                })
                .catch(err => {
                    this.loading = false;
                    console.log(err);
                })
                .finally(() => {
                    this.loading = false;
                })
        },

        data() {
            return {
                loading: true,
                contacts: []
            }
        }
    }
</script>

<style scoped>

</style>
