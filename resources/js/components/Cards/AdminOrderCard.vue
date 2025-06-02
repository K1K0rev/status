<script setup>
import { computed } from 'vue'

const props = defineProps({
	id: Number,
	status: String,
	total_price: Number(10,2)
})

const statusText = {
	'new': 'новый',
	'in_process': 'в обработке',
	'in_work': 'в работе',
}
// ['new', 'in_process', 'in_work', 'complete', 'rejected']
const getStatusText = (status) => {
	return statusText[status] || status
}

const statusColor = {
	'new': 'text-gray-500',
	'in_process': 'text-yellow-500',
	'in_work': 'text-blue-200'
}

const statusClass = computed(() => {
	return statusColor[props.status] || statusColor.default
})

</script>

<template>
	<div class='flex justify-center mb-4 items-center text-2xl group'>
		<div class='flex w-full h-20 shadow-lg shadow-primary/30 border rounded-lg'>
			<div class='flex justify-between w-full items-center px-4'>
				<span class="flex justify-between items-center h-full w-full ease-in-out transition-all duration-700">
					<span class="text-left">
						Заказ #{{ id }}
					</span>
					<span class="text-center">
						{{ total_price }} руб.
					</span>
					<span class="text-right" :class="statusClass">
						{{ getStatusText(status) }}
					</span>
				</span>
			</div>
		</div>
	</div>
</template>