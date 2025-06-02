<template>
	<section class="text-black flex flex-col gap-10">
            <span class="text-2xl sm:text-5xl text-shadow-xl">26 лет успешной деятельности</span>
                <div class="flex flex-col sm:grid sm:grid-cols-2 gap-10">
                    <CardHorizontal image="/images/banners/medal.png" text="Гарантия качества" alt="Описание изображения" />
                    <CardHorizontal image="/images/banners/gear.png" text="Новые технологии" alt="Описание изображения" />
                    <CardHorizontal image="/images/banners/lamp.png" text="Большой опыт" alt="Описание изображения" />
                    <CardHorizontal image="/images/banners/coin.png" text="Доступные цены" alt="Описание изображения" />
                </div>
            <div class="hidden sm:flex sm:gap-4">
                <div class="bg-primary w-6 border-primary rounded shadow-lg shadow-primary"></div>
                <span class="text-xl text-justify">Мы предлагаем услуги по антикоррозийной обработке,
                    пескоструйной очистке, грунтовке и порошковой покраске любых
                    поверхностей. Осуществляем чистку и покраску
                    металлоконструкций, грузовых прицепов и полуприцепов,
                    пескоструй кузова и пр. Мы разработаем для Вас оптимальное
                    техническое решение, выполним антикоррозийную обработку
                    металлоконструкций и дадим гарантию на материалы и
                    выполненные работы</span>
            </div>
        </section>
</template>

<script setup>
import CardHorizontal from '@/Components/Cards/CardHorizontal.vue';
</script>