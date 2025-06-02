<template>
    <section class="flex flex-col gap-8 text-black">
        <span class="text-3xl sm:text-5xl text-black text-shadow-xl">Мы находимся здесь</span>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2028.7999055019388!2d32.06461307743769!3d59.4364117024444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTnCsDI2JzExLjEiTiAzMsKwMDQnMDEuOSJF!5e0!3m2!1sru!2sru!4v1739473919885!5m2!1sru!2sru"
            width="100%" height="500" class="rounded-md shadow-lg shadow-gray-500" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="flex overflow-x-auto overflow-y-hidden">
            <div class="flex items-stretch">
                <div class="border-l-[4px] sm:border-l-[6px] border-primary rounded h-full"></div>

                <template v-for="(card, index) in cards" :key="index">
                    <div class="flex-1 px-6 sm:px-8">
                        <div class="flex flex-col w-[250px] sm:w-full h-fit sm:flex-row gap-1 sm:gap-8 items-center">
                            <span class="text-2xl sm:text-6xl">{{ card.title }}</span>
                            <span class="text-lg sm:text-2xl">{{ card.text }}</span>
                        </div>
                    </div>

                    <div v-if="index < cards.length - 1" class="border-r-[4px] sm:border-r-[6px] border-primary rounded h-full"></div>
                </template>

                <div class="border-r-[4px] sm:border-r-[6px] border-primary rounded h-full"></div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const cards = ref([
    {
        title: "2014",
        text: "Год начала работ"
    },
    {
        title: "120",
        text: "Обслуживаемых объектов"
    },
    {
        title: "24/7",
        text: "Техническая поддержка"
    }
]);
</script>