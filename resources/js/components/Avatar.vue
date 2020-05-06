<template>
    <div class="flex items-center" :class="inline ? 'inline-flex' : 'flex'">
        <img 
            class="inline-block rounded" 
            :class="{ 'h-16 w-16': large, 'h-12 w-12': medium, 'h-8 w-8': small }"
            :src="'/' + user.avatar_path"
            v-if="user && user.avatar_path"
        >
        <div 
            class="inline-flex bg-gray-200 text-gray-600 items-center justify-center rounded"
            :class="{ 'h-16 w-16': large, 'h-12 w-12': medium, 'h-8 w-8': small }"
            v-else
        >
            <svg
                :class="{ 'h-8 w-8': large, 'h-5 w-5': medium, 'h-3 w-3': small }" 
                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
            </svg>
        </div>

        <span v-if="user && withName" class="ml-3 text-left">
            <p 
                class="font-semibold" 
                :class="{ 
                    'text-gray-100': color == 'light', 'text-gray-800': color == 'dark', 'text-lg': large, 
                    'text-sm': small, 'mb-1': medium || large, 'mb-0': small,
                }">
                {{ user.name }}
            </p>

            <!-- prop: subtext -->
            <span 
                :class="{ 
                    'text-gray-300': color == 'light', 'text-gray-600': color == 'dark', 
                    'text-xs': small, 'text-sm': medium || large 
                }" 
                v-if="subtext"
            >
                {{ subtext }}
            </span>

        </span>
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
        user: {
            type: Object,
            required: false,
        },
        small: {
            type: Boolean,
            required: false,
            default: false,
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
        },
        withName: {
            type: Boolean,
            required: false,
            default: false,
        },
        subtext: {
            type: String,
            required: false,
        },
        color: {
            type: String,
            required: false,
            default: 'dark',
        }
    },

    data() {
        return {
            
        };
    }
}
</script>