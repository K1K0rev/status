<script setup>
import Header from '@/Components/Headers/Header.vue';
import Alerts from '@/Components/Alerts.vue';

import { usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { useAlertStore } from '@/stores/alert';
import { defineAsyncComponent } from 'vue';

const LazyFooter = defineAsyncComponent(() =>
  import('@/Components/Footer.vue')
);

const page = usePage()
const store = useAlertStore()

onMounted(() => {
  const alert = page.props.alert
  if (alert?.message) {
    store.add(alert.type, alert.message)
  }
})

</script>
<template>
    <div class="min-h-screen flex flex-col">
        <Header />
        <Alerts />
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
            <main class="flex-grow px-8 py-4 min-h-[calc(100vh-156px)] flex flex-col">
                <slot />
            </main>
        
        <LazyFooter />
    </div>
</template>
