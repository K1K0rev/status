<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ServiceInfoCard from '@/Components/ServiceInfoCard.vue';
import { route } from 'ziggy-js';

const props = defineProps({
  services: Array
})

</script>

<template>

  <Head title="Наши услуги" />

  <AuthenticatedLayout>
    <template #header>
      Информация об услугах

      <!-- <Link :href="route('services')">
        Назад у услугам
      </Link> -->
    </template>
    <ul class="grid grid-cols-5 gap-4">
      <li v-for="service in services" :key="service.id">
          <Link :href="route('service.info', service.id)">
            <ServiceInfoCard>
              <template #img>
                <img :src="service.img" alt="">
              </template>
              <template #name>
                <div class="uppercase">
                  {{ service.name }}
                </div>
              </template>
            </ServiceInfoCard>
          </Link>
      </li>
    </ul>
  </AuthenticatedLayout>
</template>