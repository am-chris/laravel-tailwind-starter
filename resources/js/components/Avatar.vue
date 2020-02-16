<template>
    <img class="inline-block mr-3 h-6 w-6 rounded" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=128&q=100">
</template>

<script>
export default {
    props: {
        userId: {
            type: Number,
            required: true,
        }
    },

    data() {
        return {
            
        };
    }
}
</script>