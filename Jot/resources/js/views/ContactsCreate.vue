<template>
    <div>
        <form @submit.prevent="submitForm">
            <input-field name="name" label="Contact Name" :errors="errors" placeholder="Contact Name" @update:field="contact.name = $event"/>
            <input-field name="email" label="Contact Email" :errors="errors" placeholder="Contact Email" @update:field="contact.email = $event" />
            <input-field name="company" label="Company Name" :errors="errors" placeholder="Company Name" @update:field="contact.company = $event"/>
            <input-field name="birthday" label="Birthday" :errors="errors" placeholder="YYYY-MM-DD" @update:field="contact.birthday = $event"/>
            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400" type="submit">New Contact</button>
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
                axios.post('/api/contacts', this.contact)
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
