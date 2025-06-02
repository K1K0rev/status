<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import BackPageButton from '@/Components/Buttons/BackPageButton.vue'

import { Head, Link } from '@inertiajs/vue3'

const { orders } = defineProps({
  orders: Object
})

</script>


<template>

  <Head title="История заказов" />

  <AuthenticatedLayout>
    <template #header>
      <h1>
        История заказов
      </h1>
      
      <BackPageButton text="Назад" link="orders" />
    </template>
    <div v-if="orders.value != null">
      <div v-for="order in orders" :key="order.id">
        <ul v-if="order.status == 'complete' || order.status == 'rejected'" class="mb-4">
          <div class="bg-white overflow-hidden shadow-lg shadow-primary/30 border rounded-lg">
            <div class='flex justify-between text-xl mx-6 mt-4'>
              Заказ # {{ order.id }}
              <span v-if="order.status == 'rejected'" class="text-red-500">
                Отклонен
              </span>
              <span v-else class="text-green-500">
                Выполнен
              </span>
            </div>
            <div class="px-6 pb-6 bg-white border-b border-gray-200">
              <div v-for="service in order.services" :key="service.id" class="flex items-center py-4 border-b">
                <img :src="service.img" class="w-20 h-20 object-cover mr-4">
                <div class="flex-1">
                  <h3 class="font-medium">{{ service.name }}</h3>
                  <p class="text-gray-600">{{ service.price }} ₽</p>
                </div>
                <div class="flex items-center">
                  <div class="w-16 text-center border rounded">
                    {{ service.pivot.quantity }}
                  </div>
                </div>
              </div>

              <div class="mt-6 flex justify-between items-center">
                <div class="text-xl font-bold">
                  Итого: {{ order.total_price }} ₽
                </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>
    <div v-else class="h-full text-center">
      <p class="text-gray-500">История заказов пуста</p>
    </div>

  </AuthenticatedLayout>
</template>