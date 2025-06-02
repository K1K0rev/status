<script setup>
import { Link } from '@inertiajs/vue3';
import BackButton from '@/Components/Buttons/BackButton.vue'
</script>

<template>
    <div>
        <Link href="/" class="flex h-[75px] m-8 absolute">
            <BackButton>назад</BackButton>
        </Link>
    </div>
    <div
        class="flex min-h-screen flex-col items-center pt-6 sm:justify-center sm:pt-0"
    >
    
    <div
    class="mt-6 w-full overflow-hidden bg-primary px-6 py-4 shadow-lg shadow-primary sm:max-w-md sm:rounded-lg"
    >
        <div class="flex justify-center">
            <img src="/images/icons/logo/logo.png" alt="" class="w-24 my-5">
        </div>
            <slot />
        </div>
    </div>
</template>
