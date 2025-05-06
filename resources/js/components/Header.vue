<script setup>
import { Link } from '@inertiajs/vue3';
import { inject } from 'vue';
import PrimaryButton from './PrimaryButton.vue';
import { route } from 'ziggy-js';

let canLogin = inject("canLogin");

</script>
<template>
    <header class="h-24 flex justify-between bg-[#1D2A40] rounded-lg text-white items-center px-8 mx-8">
        <div class="flex items-center gap-4">
            <img src="/images/logo.png" alt="Логотип" class=" size-20">
            <span class="flex flex-col text-2xl">
                ООО "СТАТУС"
                <span class="text-lg">
                    Антикоррозийная обработка
                </span>
            </span>
        </div>
        <!-- <nav v-if="canLogin" class="flex flex-1">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="">
            Dashboard
            </Link>

        </nav> -->

        <Link v-if="canLogin" :href="route('login')">
            <PrimaryButton>ВОЙТИ</PrimaryButton>
        </Link>


    </header>
</template>