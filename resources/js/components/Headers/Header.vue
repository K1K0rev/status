<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'
import { route } from 'ziggy-js'

import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
import NavLink from '@/Components/NavLink.vue'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'

const open = ref(false)
const showingNavigationDropdown = ref(false)

const page = usePage()
const cartCount = page.props.cartCount

</script>
<template>
    <header class="h-24 w-full bg-[#1D2A40] text-white items-center px-8"
    :class="$page.props.auth?.user && $page.props.auth?.user?.role != 'admin' ? 'grid grid-cols-[1fr_auto_1fr]' : 'flex justify-between'
    ">
        <div class="flex items-center gap-4">
            <img src="/images/icons/logo/logo.png" alt="Логотип" class="size-14 sm:size-20">
            <span class="flex flex-col w-full text-base sm:text-xl">
                СТАТУС
                <span class="text-xs sm:text-lg">
                    Антикоррозионная обработка
                </span>
            </span>
        </div>
        <div v-if="$page.props.auth?.user?.role != 'admin'">
            <nav v-if="$page.props.auth?.user">
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <NavLink :href="route('services')" :active="route().current('services')">
                        Услуги
                    </NavLink>
                    <NavLink :href="route('orders')" :active="route().current('orders')">
                        Заказы
                    </NavLink>
                    <NavLink :href="route('chats')" :active="route().current('chats')">
                        Чаты
                    </NavLink>
                </div>
    
                <div :class="{
                    block: showingNavigationDropdown,
                    hidden: !showingNavigationDropdown,
                }" class="sm:hidden">
                    <div class="space-y-1 pb-3 pt-2">
                        <ResponsiveNavLink :href="route('services')" :active="route().current('services')">
                            Услуги
                        </ResponsiveNavLink>
                    </div>
                </div>
            </nav>
        </div>

        <div v-if="$page.props.auth?.user" class="flex justify-self-end">
            <div v-if="$page.props.auth?.user?.role != 'admin'">
                <Link :href="route('cart.index')" class="flex relative">
                <img src="/images/icons/basket.png" alt="Корзина" class="w-10">
                <span
                    class="absolute -top-1 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                    {{ cartCount }}
                </span>
                </Link>
            </div>
            <div class="relative ms-3">
                <Dropdown align="right" width="48" v-model="open">
                    <template #trigger>
                        <div class="-me-2 flex items-center">
                            <button
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path v-if="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </template>

                    <template #content>
                        <DropdownLink :href="route('profile.edit')">
                            Профиль
                        </DropdownLink>
                        <DropdownLink :href="route('profile.edit')">
                            О нас
                        </DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">
                            Выйти
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
        </div>
        <Link v-else :href="route('login')" class="col-start-4">
            <PrimaryButton>
                ВОЙТИ
            </PrimaryButton>
        </Link>
    </header>
</template>
