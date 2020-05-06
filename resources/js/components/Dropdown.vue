<template>
    <div 
        class="relative"
        :class="{ 'inline-block': inline, 'block': !inline, 'text-left': position == null || position == 'left', 'text-right': position == 'right' }" 
    >
        <button type="button" 
            class="fixed inset-0 h-full w-full cursor-default" 
            @click="toggleVisibility()" 
            v-if="visible && alwaysVisible == false"
        ></button>

        <button class="relative inline-block px-1 z-30" @click="toggleVisibility()">
            <slot></slot>

            <svg v-if="caret" class="fill-current text-white opacity-50 h-4 w-4 inline-block ml-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path>
            </svg>
        </button>

        <div class="bg-white text-gray-400 list-none absolute w-40 text-left shadow-lg rounded mt-2 p-0 rounded hover:rounded z-20" 
            :class="{ 'w-64': full, 'right-0': position == 'right', 'left-0': position == 'left' }"
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
        full: {
            type: Boolean,
            required: false,
            default: false,
        },
        caret: {
            type: Boolean,
            required: false,
            default: false,
        },
        position: {
            type: String,
            required: false,
            default: 'left',
        },
        alwaysVisible: {
            type: Boolean,
            required: false,
            default: false,
        }
    },

    data() {
        return {
            visible: this.alwaysVisible == false ? false : true,
        };
    },

    methods: {
        toggleVisibility() {
            if (this.alwaysVisible == true) {
                this.visible = true;

                return;
            }

            this.visible = !this.visible;
        }
    }
}
</script>