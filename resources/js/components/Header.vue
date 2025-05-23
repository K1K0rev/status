<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'
import { route } from 'ziggy-js'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import NavLink from '@/Components/NavLink.vue'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'

const showingNavigationDropdown = ref(false)

const page = usePage()
const cartCount = page.props.cartCount

</script>
<template>
    <header class="h-24 w-full grid grid-cols-[1fr_auto_1fr] bg-[#1D2A40] text-white items-center px-8">
        <div class="flex items-center gap-4">
            <img src="/images/logo.png" alt="Логотип" class=" size-20">
            <span class="flex flex-col text-2xl">
                ООО "СТАТУС"
                <span class="text-lg">
                    Антикоррозийная обработка
                </span>
            </span>
        </div>
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

            <!-- Responsive Navigation Menu -->
            <div :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }" class="sm:hidden">
                <div class="space-y-1 pb-3 pt-2">
                    <ResponsiveNavLink :href="route('services')" :active="route().current('services')">
                        Услуги
                    </ResponsiveNavLink>
                </div>

                <!-- Responsive Settings Options -->
                <div class="border-t border-gray-200 pb-1 pt-4">
                    <div class="px-4">
                        <div class="text-base font-medium text-gray-800">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="text-sm font-medium text-gray-500">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">
                            Profile
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                            Log Out
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>

        <div v-if="$page.props.auth?.user" class="flex justify-self-end">
            <Link :href="route('cart.index')" class="flex relative">
            <img src="/images/basket.png" alt="Корзина" class="w-10 hover:w-11 ease-in-out transition-all duration-400">
            <span
                class="absolute -top-1 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                {{ cartCount }}
            </span>
            </Link>
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <div class="relative ms-3">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center rounded-md border border-transparent bg-secondary px-3 py-2 text-xl font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                                    {{ $page.props.auth.user.login }}
                                    <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <DropdownLink :href="route('profile.edit')">
                                Профиль
                            </DropdownLink>
                            <DropdownLink :href="route('logout')" method="post" as="button">
                                Выйти
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="
                    showingNavigationDropdown =
                    !showingNavigationDropdown
                    "
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{
                            hidden: showingNavigationDropdown,
                            'inline-flex':
                                !showingNavigationDropdown,
                        }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{
                            hidden: !showingNavigationDropdown,
                            'inline-flex':
                                showingNavigationDropdown,
                        }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <PrimaryButton v-else :href="route('login')" class="col-start-4">
            ВОЙТИ
        </PrimaryButton>
    </header>
</template>