<script setup>
import CardHorizontal from "@/Components/CardHorizontal.vue"
import CardVertical from "@/Components/CardVertical.vue"
import Footer from "@/Components/Footer.vue"
import Header from "@/Components/Header.vue"
import HeaderInfo from "@/Components/HeaderInfo.vue"
import PrimaryButton from "@/Components/PrimaryButton.vue"
import { Head } from "@inertiajs/vue3"
import { route } from 'ziggy-js'
import { onMounted, onUnmounted, ref } from "vue"

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
})

const isVisible = ref(false)

const handleScroll = () => {
    const scrollPosition = window.scrollY

    isVisible.value = scrollPosition > 200
}

onMounted(() => {
    window.addEventListener("scroll", handleScroll)
})

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll)
})
</script>

<template>

    <Head title="Начальная"></Head>

    <HeaderInfo id='start'></HeaderInfo>

    <Header />

    <main class="text-white mx-8 my-4 flex flex-col gap-[90px]">
        <a href='#start' class="w-auto bg-secondary border-0 rounded fixed right-8 bottom-8 p-2" v-if="isVisible">
            <img src="/images/arrow_up.png" alt="Стрелка вверх" class="w-8" />
        </a>

        <div class="bg-[url(/images/w_1.jpeg)] bg-cover bg-center h-[75vh] rounded-md">
            <div class="flex flex-col w-[600px] justify-center h-full gap-[25px] ml-[90px]">
                <h1 class="text-6xl drop-shadow-dark">
                    Антикоррозийная обработка металла
                </h1>
                <span class="text-secondary text-2xl drop-shadow-dark">Качественная защита по разумной цене</span>
                <PrimaryButton :href="route('register')">регистрируйся</PrimaryButton>
            </div>
        </div>

        <div class="text-black flex flex-col gap-[40px]">
            <span class="text-5xl">26 лет успешной деятельности</span>
            <div class="w-auto flex justify-center">
                <div class="grid grid-cols-2 gap-[52px]">
                    <CardHorizontal image="/images/medal.png" text="Гарантия качества" alts="Описание изображения" />
                    <CardHorizontal image="/images/gear.png" text="Новые технологии" alts="Описание изображения" />
                    <CardHorizontal image="/images/lamp.png" text="Большой опыт" alts="Описание изображения" />
                    <CardHorizontal image="/images/coin.png" text="Доступные цены" alts="Описание изображения" />
                </div>
            </div>
            <div class="flex gap-4">
                <div class="border-[4px] border-primary rounded"></div>
                <span class="text-xl text-justify">Мы предлагаем услуги по антикоррозийной обработке,
                    пескоструйной очистке, грунтовке и порошковой покраске любых
                    поверхностей. Осуществляем чистку и покраску
                    металлоконструкций, грузовых прицепов и полуприцепов,
                    пескоструй кузова и пр. Мы разработаем для Вас оптимальное
                    техническое решение, выполним антикоррозийную обработку
                    металлоконструкций и дадим гарантию на материалы и
                    выполненные работы</span>
            </div>
        </div>

        <div class="flex flex-col text-black gap-8">
            <span class="text-4xl">Мы предоставляем широкий спектр услуг</span>
            <div class="w-auto flex justify-center">
                <div class="flex gap-[52px]">
                    <CardVertical image="/images/card_vertical_1.jpeg" text="Огнезащита конструкций"
                        alt="Огнезащита конструкций" />
                    <CardVertical image="/images/card_vertical_2.jpeg" text="Абразивоструйная обработка"
                        alt="Абразивоструйная обработка" />
                    <CardVertical image="/images/card_vertical_3.jpeg" text="Антикоррозийная обработка"
                        alt="Антикоррозийная обработка" />
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-8 text-black">
            <span class="text-4xl text-black">Мы находимся здесь</span>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2028.7999055019388!2d32.06461307743769!3d59.4364117024444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTnCsDI2JzExLjEiTiAzMsKwMDQnMDEuOSJF!5e0!3m2!1sru!2sru!4v1739473919885!5m2!1sru!2sru"
                width="100%" height="700" class="rounded-md" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="flex">
                <div class="flex gap-8 w-full justify-between">
                    <div class="border-[5px] border-primary rounded"></div>
                    <div class="flex gap-8 items-center">
                        <span class="text-6xl">2014</span>
                        <span class="text-2xl w-auto">Год начала работ</span>
                    </div>

                    <div class="border-[5px] border-primary rounded"></div>
                    <div class="flex gap-8 items-center">
                        <span class="text-6xl">120</span>
                        <span class="text-2xl">Обслуживаемых объектов </span>
                    </div>

                    <div class="border-[5px] border-primary rounded"></div>
                    <div class="flex gap-8 items-center">
                        <span class="text-6xl">24/7</span>
                        <span class="text-2xl">Техническая поддержка</span>
                    </div>

                    <div class="border-[5px] border-primary rounded"></div>
                </div>
            </div>
        </div>
    </main>

    <Footer />
</template>
