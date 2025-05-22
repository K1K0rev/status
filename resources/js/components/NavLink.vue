<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-1 pt-1 leading-5 focus:outline-none transition duration-150'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-bold leading-5 text-gray-500 hover:text-gray-400 hover:px-4 hover:text-3xl focus:text-gray-700 duration-700 ',
);
</script>

<template>
    <Link :href="href" :class="classes" class='text-2xl'>
        <slot />
    </Link>
</template>
