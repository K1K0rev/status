<script setup>
import AdminPanelLayot from '@/Layouts/AdminPanelLayot.vue';
import BackPageButton from '@/Components/Buttons/BackPageButton.vue';

const {order} = defineProps({
	order: Object
})

</script>

<template>
	<AdminPanelLayot>

		<template #header>
      <h2>
				Заказ
        <span class="bg-red-500 rounded px-2 text-white">
					#{{ order.id }}
				</span>
      </h2>

      <BackPageButton link="admin_panel.index" />
    </template>
		<section class="mb-4 flex flex-col gap-4">
			<span class="text-xl">Информация о заказчике</span>
	
			<div>
				<span>Логин заказчика: {{ order.user.login }}</span>
				<div v-if="order.user.fullname">
					<span>Имя заказчика: {{ order.user.fullname }}</span>
				</div>
				<div v-if="order.user.phone">
					<span>Телефон заказчика: {{ order.user.phone }}</span>
				</div>
			</div>
		</section>
		
		<section class="mb-4 flex flex-col gap-4">
			<span class="text-xl">Информация о заказe</span>
			<pre>{{ JSON.stringify(order.services) }}</pre>
			<div v-for="service in order.services" :key="service.id">
				<span>Услуга: {{ service.name }}</span>
			</div>
		</section>
	</AdminPanelLayot>
</template>