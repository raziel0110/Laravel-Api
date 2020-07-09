<template>
    <div>
        <div class="flex justify-between">
            <a href="#" class="text-blue-400" @click="$router.back()">
                < Back
            </a>
        </div>
        <form @submit.prevent="submitForm">
            <input-field name="name" label="Contact Name" :errors="errors" placeholder="Contact Name" @update:field="contact.name = $event" :data="contact.name"/>
            <input-field name="email" label="Contact Email" :errors="errors" placeholder="Contact Email" @update:field="contact.email = $event" :data="contact.email"/>
            <input-field name="company" label="Company Name" :errors="errors" placeholder="Company Name" @update:field="contact.company = $event " :data="contact.company"/>
            <input-field name="birthday" label="Birthday" :errors="errors" placeholder="YYYY-MM-DD" @update:field="contact.birthday = $event" :data="contact.birthday"/>
            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400" type="submit">Save Contact</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../components/InputField";
    export default {
        name: "ContactsCreate",
        components: {
            'inputField': InputField
        },

        mounted() {
            axios.get('/api/contacts/' + this.$route.params.id)
                .then(response => {
                    if (response && response.data.data) {
                        this.contact = response.data.data;
                        this.loading = false;
                    }
                })
                .catch(err => {
                    this.loading = false;

                    if(err.response.status === 404) {
                        this.$router.push('/contacts');
                    }
                });
        },
        data() {
            return {
                contact: {
                    name: '',
                    email: '',
                    company: '',
                    birthday: ''
                },
                errors: null,
            }
        },

        methods: {
            submitForm(){
                axios.patch('/api/contacts/' + this.$route.params.id, this.contact)
                    .then(response => {
                        this.$router.push(response.data.links.self);
                    })
                    .catch(err => {
                        this.errors = err.response.data.errors;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
