<script setup>
import PrimaryButton from '../Buttons/PrimaryButton.vue'

const cards = defineProps({
        image: String,
        text: String,
        alt: String,
        href: String
    });
</script>

<template>
    <div class="flex flex-col bg-primary w-auto rounded-lg h-fit items-center text-white shadow-lg shadow-primary">
        <img :src="cards.image" :alt="cards.alt" class="rounded-t-lg w-full">
        <div class="text-center h-full flex flex-col items-center justify-center gap-8">
            <p class="drop-shadow-dark text-xl uppercase my-10 px-4">{{ cards.text }}</p>
        </div>
    </div>
</template>
