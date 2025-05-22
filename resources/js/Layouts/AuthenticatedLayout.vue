<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
</script>
<template>
    <div class="min-h-screen flex flex-col">
        <Header/>
            <!-- Page Heading -->
            <header
                class="bg-white shadow"
                v-if="$slots.header"
            >
                <div class="text-2xl px-8 py-4 lg:px-8 flex justify-between it">
                    <slot name="header"/>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-grow px-8 py-4 min-h-[calc(100vh-156px)]">
                <slot />
            </main>
        
        <Footer/>
    </div>
</template>
