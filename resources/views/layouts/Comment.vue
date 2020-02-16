<template>
    <div>
        <avatar
            :user-id="userId"
        ></avatar>
    </div>
</template>

<script>
import Avatar from './Avatar.vue';

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