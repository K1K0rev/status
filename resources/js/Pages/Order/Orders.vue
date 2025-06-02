<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import NextPageButton from '@/Components/Buttons/NextPageButton.vue'

const { orders } = defineProps({
  orders: Array
})
</script>

<template>

  <Head title='Заказы' />

  <AuthenticatedLayout>
    <template #header>
      <h2>
        Активные заказы
      </h2>

      <!-- <Link :href="route('orders.history')" class="text-lg flex items-baseline">
      <span class="hover:text-xl transition-all easy-in-out duration-700">
        Посмотреть историю заказов
      </span>
      <img src="/images/double_arrow.png" alt="" class="h-3 w-3 ml-1">
      </Link> -->
      <NextPageButton text="Посмотреть историю заказов" link="orders.history" />
    </template>
    <div v-if="orders.length > 0">
      <ul v-for="order in orders" :key="order.id" class="mb-4">
        <div v-if="order.status != 'complete' && order.status != 'rejected'">
          <div class="bg-white overflow-hidden shadow-lg shadow-primary/30 border rounded-lg">
            <div class="flex justify-between mx-6 mt-4">
              <div class='text-xl'>
                Заказ # {{ order.id }}
              </div>
              <Link :href="route('orders.info', order.id)"
                class='flex items-baseline hover:text-lg transition-all easy-in-out duration-700'>
              Информация о заказе
              <img src="/images/icons/arrows/double_arrow.png" alt="" class="h-3 w-3 ml-1">
              </Link>
            </div>
            <div class="px-6 pb-6 bg-white border-b border-gray-200">
              <div v-for="service in order.services" :key="service.id" class="flex items-center py-4 border-b">
                <img :src="service.img" class="w-20 h-20 object-cover mr-4 rounded">
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
        </div>
      </ul>
    </div>
    <div v-else class="h-full text-center">
			<p class="text-gray-500">Нет активных заказов</p>
		</div>
  </AuthenticatedLayout>
</template>