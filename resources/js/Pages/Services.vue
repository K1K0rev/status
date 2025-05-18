<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ServiceCard from '@/Components/ServiceCard.vue';
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
      <Link class="text-lg flex items-baseline" :href="route('services.info')">
        <span class="hover:text-xl transition-all easy-in-out duration-700">
          Узнать подробнее об услугах
        </span>
        <img src="/images/double_arrow.png" alt="" class="h-3 w-3 ml-1">
      </Link>
    </template>
    <ul>
      <li v-for="service in services" :key="service.id">
          <Link :href="route('services.add_to_cart', service.id)">
            <ServiceCard>
              <template #name>
                {{ service.name }}
              </template>
              <template #price>
                {{ service.price }}
              </template>
            </ServiceCard>
          </Link>
      </li>
    </ul>

  </AuthenticatedLayout>
</template>