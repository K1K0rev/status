<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BackPageButton from '@/Components/Buttons/BackPageButton.vue';

import { Head, Link } from '@inertiajs/vue3';
import ServiceInfoCard from '@/Components/Cards/ServiceInfoCard.vue';
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

      <!-- <Link :href="route('services')" class="text-lg flex items-baseline">
      <img src="/images/icons/arrows/double_arrow.png" alt="" class="h-3 w-3 mr-1 rotate-180">
      <span class="hover:text-xl transition-all easy-in-out duration-700">
        Назад
      </span>
      </Link> -->
      <BackPageButton text="Назад" link="services" />
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