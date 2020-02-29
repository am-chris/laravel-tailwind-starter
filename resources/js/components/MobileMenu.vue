<template>
    <div class="xs:block md:hidden">
        <button type="button" @click="open = !open">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="fill-current text-gray-300 h-6 w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
        </button>

        <div v-if="open" class="fixed top-0 right-0 left-0 bottom-0 bg-white py-4 px-6">
            <button type="button" @click="open = !open">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="fill-current text-gray-800 h-6 w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
            </button>
            <div class="text-left mt-3">
                <avatar 
                    :user="user"
                    small
                    with-name
                    class="mb-8"
                ></avatar>

                <a href="#" class="text-lg">Home</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        loggedIn: {
            type: Boolean,
            required: true,
            default: false,
        },
        user: {
            type: Object,
            required: false,
            default: null,
        }
    },

    data() {
        return {
            open: false,
        };
    }
}
</script>