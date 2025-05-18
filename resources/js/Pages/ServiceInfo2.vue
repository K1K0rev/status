<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ServiceCard from '@/Components/ServiceCard.vue';

const props = defineProps({
  services: Array
})

</script>

<template>

  <Head title="Наши услуги" />

  <AuthenticatedLayout>
		
  </AuthenticatedLayout>
</template>