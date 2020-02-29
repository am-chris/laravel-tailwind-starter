<template>
    <div class="flex items-center" :class="inline ? 'inline-flex' : 'flex'">
        <img 
            class="inline-block mr-2 rounded" 
            :class="{ 'h-16 w-16': large, 'h-12 w-12': medium, 'h-8 w-8': small }"
            :src="'/' + user.avatar_path">
        <span v-if="withName" class="ml-1 text-left">
            <p 
                class="font-semibold" 
                :class="{ 
                    'text-gray-100': light, 'text-lg': large, 
                    'text-sm': small, 'mb-1': medium || large, 'mb-0': small,
                }">
                {{ user.name }}
            </p>

            <!-- prop: subtext -->
            <span 
                :class="{ 
                    'text-gray-300': light, 'text-gray-600': light == false, 
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
        light: {
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