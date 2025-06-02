<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NextPageButton from '@/Components/Buttons/NextPageButton.vue';

import { Head, Link } from '@inertiajs/vue3';
import ServiceCard from '@/Components/Cards/ServiceCard.vue';
import { route } from 'ziggy-js';

const props = defineProps({
  services: Array
})

</script>

<template>

  <Head title="Наши услуги" />

  <AuthenticatedLayout>
    <template #header>
      <h2>
        Услуги
      </h2>

      <NextPageButton text="Узнать подробнее об услугах" link="services.info" />
    </template>
    <ul>
      <li v-for="service in services" :key="service.id">
          <Link :href="route('services.add_to_cart', service.id)">
            <ServiceCard :name="service.name" :price="service.price" :icon="service.icon"/>
          </Link>
      </li>
    </ul>

  </AuthenticatedLayout>
</template>