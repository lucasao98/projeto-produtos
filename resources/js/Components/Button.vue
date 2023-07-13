<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
   href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <button type="submit" v-show="title"
        class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
    >
    <a :href="href">{{title}}</a>
        <slot />
    </button>
</template>
