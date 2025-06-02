<template>
    <section class="flex flex-col text-black gap-8">
        <h2 class="text-3xl sm:text-5xl text-shadow-xl">
            Мы предоставляем широкий спектр услуг
        </h2>
        
        <!-- Десктопная версия (grid) -->
        <div class="hidden lg:grid lg:grid-cols-3 gap-6 lg:gap-10 ">
            <CardVertical 
                v-for="(card, index) in cards" 
                :key="'desktop-' + index"
                :image="card.image" 
                :text="card.text"
                :alt="card.alt"
                class="h-full hover:scale-105 transition-all duration-300"
            />
        </div>
        
        <!-- Мобильная версия (центрированный слайдер) -->
        <div class="lg:hidden relative w-full sm:mx-auto max-w-md">
            <div 
                ref="slider"
                class="w-full"
            >
                <div 
                    class="flex transition-transform duration-300"
                    :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
                >
                    <div 
                        v-for="(card, index) in cards" 
                        :key="'mobile-' + index" 
                        class="flex-shrink-0 w-full px-4"
                    >
                        <CardVertical 
                            :image="card.image" 
                            :text="card.text" 
                            :alt="card.alt"
                            class="w-full transition-all duration-300"
                            :class="{
                            'scale-105': currentSlide === index,
                            'scale-95': currentSlide !== index
                        }"
                        />
                    </div>
                </div>
            </div>
            
            <!-- Навигационные стрелки -->
            <button 
                @click="prevSlide"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md z-10"
                :disabled="currentSlide === 0"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            
            <button 
                @click="nextSlide"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md z-10"
                :disabled="currentSlide === cards.length - 1"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import CardVertical from '@/Components/Cards/CardVertical.vue';

const cards = ref([
    {
        image: "/images/banners/card_vertical_1.jpeg",
        text: "Огнезащита конструкций",
        alt: "Огнезащита конструкций"
    },
    {
        image: "/images/banners/card_vertical_2.jpeg",
        text: "Абразивоструйная обработка",
        alt: "Абразивоструйная обработка"
    },
    {
        image: "/images/banners/card_vertical_3.jpeg",
        text: "Антикоррозийная обработка",
        alt: "Антикоррозийная обработка"
    }
]);

const currentSlide = ref(0);

const prevSlide = () => {
    if (currentSlide.value > 0) {
        currentSlide.value--;
    }
};

const nextSlide = () => {
    if (currentSlide.value < cards.value.length - 1) {
        currentSlide.value++;
    }
};
</script>

<style scoped>
/* Анимация перехода между слайдами */
.transition-transform {
    transition-property: transform;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Стили для неактивных кнопок */
button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>