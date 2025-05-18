<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import OrderCards from '@/Components/OrderCards.vue';

  const props = defineProps({
    orders: Array
  }
)
</script>

<template>
  <Head title='Заказы' />

  <AuthenticatedLayout>
    <template #header>
      <h2>
        Заказы
      </h2>
    </template>

      <ul v-for="order in orders" :key="order.id">
        <pre>{{ JSON.stringify(order) }}</pre>
        <li>
          <OrderCards>
            <template #name>
              <div v-for="service in order.services" :key="service.id">
                {{ service.name }}
              </div>
              {{ order.total_price }}
            </template>
          </OrderCards>
        </li>
      </ul>
  </AuthenticatedLayout>
</template>