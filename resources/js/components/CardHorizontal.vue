<script setup>

const cards = defineProps({
        image: String,
        text: String,
        alts: String,
    });
</script>

<template>
    <div class="flex flex-col bg-primary w-[500px] rounded-md h-[350px] justify-center items-center text-white gap-6">
        <img :src="cards.image" :alt="cards.alt" class="w-[180px] h-auto">
        <div>
            <p class="drop-shadow-dark text-2xl uppercase">{{ cards.text }}</p>
        </div>
    </div>
</template>
