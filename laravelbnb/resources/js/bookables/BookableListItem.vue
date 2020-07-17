<template>
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title">{{title}}</h5>
            <p class="card-text">{{content}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BookableListItem",
        props: {
            'title': {
                type: String,
                required: true
            },
            'content': {
                type: String,
                required: true
            },
            'price': {
                type: Number,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
