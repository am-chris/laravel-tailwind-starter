<template>
    <div :class="inline == true ? 'inline' : 'block'">
        <button type="button" 
            class="w-full h-full top-0 right-0 left-0 bottom-0 absolute z-10 block" 
            @click="visible = false" 
            v-if="visible"
        ></button>

        <button class="relative px-1 z-30" @click="visible = !visible">
            <slot></slot>
        </button>

        <div class="right-0 mr-3 bg-white text-gray-400 list-none absolute w-32 text-left shadow-lg rounded mt-1 p-0 rounded hover:rounded z-20" 
            v-if="visible == true">
            <slot name="dropdown-items"></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        inline: {
            type: Boolean,
            required: false,
            default: false,
        },
    },

    data() {
        return {
            visible: false,
        };
    }
}
</script>