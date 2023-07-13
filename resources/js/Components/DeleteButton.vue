<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <button type="submit" v-show="title"
        class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
    >
    {{title}}
    <slot />
    </button>
</template>
