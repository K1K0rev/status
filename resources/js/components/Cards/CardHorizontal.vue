<script setup>

const cards = defineProps({
        image: String,
        text: String,
        alt: String,
    });
</script>

<template>
    <div class="flex flex-col shadow-lg shadow-primary w-full rounded-lg h-fit justify-center items-center bg-primary text-white py-4 sm:py-10">
        <img :src="cards.image" :alt="cards.alt" class="w-[180px] h-auto">
        <div>
            <p class="drop-shadow-dark text-2xl uppercase">{{ cards.text }}</p>
        </div>
    </div>
</template>
