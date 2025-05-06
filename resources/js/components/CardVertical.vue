<script setup>
import PrimaryButton from './PrimaryButton.vue'

const cards = defineProps({
        image: String,
        text: String,
        alts: String,
    });
</script>

<template>
    <div class="flex flex-col bg-primary w-[400px] rounded-md h-[500px] items-center text-white">
        <img :src="cards.image" :alt="cards.alt" class="">
        <div class="text-center h-full flex flex-col items-center justify-center gap-8">
            <p class="drop-shadow-dark text-2xl uppercase">{{ cards.text }}</p>
            <PrimaryButton>узнать больше</PrimaryButton>
        </div>
    </div>
</template>
