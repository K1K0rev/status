<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String
    }
})
</script>

<template>
    <Link
        class="w-max inline-block items-center rounded-md border-2 border-transparent bg-[#FFD700] px-4 py-2 uppercase tracking-wide text-black transition duration-150 ease-in-out hover:bg-inherit hover:border-2 hover:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700] focus:ring-offset-2 active:bg-[#FFD700]">
        <slot></slot>
    </Link>
</template>
