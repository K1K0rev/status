<script setup>
import HeaderInfo from "@/Components/Headers/HeaderInfo.vue"
import Header from "@/Components/Headers/Header.vue"
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue"
import LazySection from "@/Pages/Welcome/Partial/LazySection.vue"
import Footer from "@/Components/Footer.vue"

import { Head, Link } from "@inertiajs/vue3"
import { route } from 'ziggy-js'
import { defineAsyncComponent, onMounted, onUnmounted, ref } from "vue"

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

const sections = [
    {
        component: defineAsyncComponent(() => import('@/Pages/Welcome/Partial/Proposter.vue')),
        props: {} // пропсы если нужны
    },
    {
        component: defineAsyncComponent(() => import('@/Pages/Welcome/Partial/Services.vue')),
        props: {}
    },
    {
        component: defineAsyncComponent(() => import('@/Pages/Welcome/Partial/Map.vue')),
        props: {}
    }
];

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

    <main class="text-white mx-8 my-4 flex flex-col gap-9 sm:gap-20">
        <a href='#start' class="w-auto bg-secondary border-0 rounded-lg fixed z-10 right-8 bottom-8 p-2"
            v-if="isVisible">
            <img src="/images/icons/arrows/arrow_up.png" alt="Стрелка вверх" class="w-6 sm:w-8" />
        </a>

        <section
            class="bg-[url(/images/banners/welcome_1.jpeg)] bg-cover bg-center h-[80vh] rounded-md p-10 shadow-lg shadow-gray-500">
            <div class="flex flex-col w-auto justify-center h-full gap-[25px]">
                <div class="flex flex-col gap-5">
                    <h1 class="text-4xl sm:text-6xl text-shadow-dark">
                        Антикоррозионная обработка металла
                    </h1>
                    <span class="text-secondary text-2xl text-shadow-dark">Качественная защита по разумной цене</span>
                </div>
                <Link :href="route('register')" class="w-fit">
                <PrimaryButton>регистрируйся</PrimaryButton>
                </Link>
            </div>
        </section>

        <LazySection v-for="(section, index) in sections" 
        :key="index" 
        :section="section" 
        />

    </main>

    <Footer />
</template>
