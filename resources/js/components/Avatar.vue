<template>
    <img 
        class="inline-block mr-2 rounded" 
        :class="{ 'h-24 w-24': large, 'h-12 w-12': medium, 'h6 w-6': small }"
        src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=128&q=100">
</template>

<script>
export default {
    props: {
        userId: {
            type: Number,
            required: true,
        },
        small: {
            type: Boolean,
            required: false,
            default: true,
        },
        medium: {
            type: Boolean,
            required: false,
            default: false,
        },
        large: {
            type: Boolean,
            required: false,
            default: false,
        }
    },

    data() {
        return {
            
        };
    }
}
</script>