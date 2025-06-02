<template>
	<AdminPanel>
		<div v-for="order in orders" :key="order.id">
			<Link :href="route('admin_panel.order.show', order.id)">
				<AdminOrderCard :id="order.id" :status="order.status" :total_price="order.total_price" />
			</Link>
		</div>
	</AdminPanel>
</template>

<script setup>
import AdminOrderCard from '@/Components/Cards/AdminOrderCard.vue';
import AdminPanel from '@/Layouts/AdminPanelLayot.vue';
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const {orders} = defineProps({
	orders: Object
})
</script>