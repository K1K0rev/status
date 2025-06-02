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

		<span class="text-xl">Информация о заказе</span>

		<div>
			<!-- <pre>{{ JSON.stringify(order) }}</pre> -->
			<span>{{ order.user.login }}</span>
		</div>
	</AdminPanelLayot>
</template>