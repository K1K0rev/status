<script setup>
import { Head } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import OrderInfoCard from '@/components/OrderInfoCard.vue'
import OrderHistoryCard from '@/components/OrderHistoryCard.vue'
import { format } from 'date-fns'
import { computed } from 'vue'


const { order } = defineProps({
  order: Object
})

const statusAnimate = computed(() => order.status)

const isActive = (status) => statusAnimate.value === status

const statuses = ['new', 'in_process', 'in_work', 'complete']

const activeIndex = statuses.indexOf(order.status)

function barStyle(status) {
  const index = statuses.indexOf(status)
  if (index < 0) return 'bg-gray-300'

  if (index < activeIndex) return 'bg-green-500'
  if (index === activeIndex) return 'bg-green-500 animate-gradient'
  return 'bg-gray-300'
}

</script>

<template>

  <Head :title="`Заказ #${order.id}`" />

  <AuthenticatedLayout>

    <template #header>
      <h1>
        Заказ #{{ order.id }}
      </h1>
    </template>
    <div id='status' class='grid grid-cols-7 grid-rows-subgrid gap-y-2 text-center mb-4'>
      <OrderInfoCard src="/images/order_progres.png" :animate="isActive('new')" />
      <div class="flex items-center">
        <div :class="['h-2 flex-grow', barStyle('new')]"></div>
      </div>
      <OrderInfoCard src="/images/order_placed.png" :animate="isActive('in_process')" />
      <div class="flex items-center">
        <div :class="['h-2 flex-grow', barStyle('in_process')]"></div>
      </div>
      <OrderInfoCard src="/images/order_in_work.png" :animate="isActive('in_work')" />
      <div class="flex items-center">
        <div :class="['h-2 flex-grow', barStyle('in_work')]"></div>
      </div>
      <OrderInfoCard src="/images/order_completed.png" :animate="isActive('complete')" />
      <span class='col-start-1'>Создан</span>
      <span class='col-start-3'>В обработке</span>
      <span class='col-start-5'>В работе</span>
      <span class='col-start-7'>Завершен</span>
    </div>

    <h2 class="text-2xl my-2">История заказа</h2>
    <div v-if="order.history_orders.length > 0">
      <div v-for="history in order.history_orders" :key="history.id">
        <OrderHistoryCard :title="history.title" />
        <div class="flex-column p-4 mb-4 bg-[#EFEFEF] border rounded-lg">
          <div class="mb-4">
            {{ history.description }}
          </div>
          <span class="flex justify-end">
            {{ format(new Date(history.created_at), 'HH:mm, dd.MM.yyyy') }}
          </span>
        </div>
      </div>
    </div>

    <div v-else class="w-full h-full text-center">
      <p class="text-gray-500">История заказа пуста</p>
    </div>

  </AuthenticatedLayout>
</template>

<style>
@keyframes fill-gradient {
  0% {
    background-position: 0 0;
  }

  50% {
    background-position: 100% 0;
  }

  100% {
    background-position: 0 0;
  }
}

.animate-gradient {
  background: linear-gradient(to right,
      #22c55e 0%,
      #c8ffe6 50%,
      #22c55e 100%);
  background-size: 200% 100%;
  animation: fill-gradient 2s linear infinite;
}
</style>