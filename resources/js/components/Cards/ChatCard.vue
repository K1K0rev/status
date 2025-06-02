<script setup>
import { computed } from 'vue'

	const props = defineProps({
		id: Number,
		status: String,
    role: String
	})

  const statusText = {
    'not_active': 'не активен',
    'active': 'активен',
    'complete': 'выполнен',
  }
  
  const getStatusText = (status) => {
    return statusText[status] || status
  }

  const statusColor = {
    'active': 'text-blue-500',
    'not_active': 'text-red-500',
    'complete': 'text-green-500',
    'default': 'text-gray-200'
  }

  const statusClass = computed(() => {
    return statusColor[props.status] || statusColor.default
  })

</script>

<template>
  <div class='flex justify-center mb-4 items-center text-2xl group'>
    <div class='flex w-full h-20 shadow-lg shadow-primary/30 border rounded-lg'>
      <div class='flex justify-between w-full items-center px-4'>
        <span
          class="flex justify-between items-center h-full w-full ease-in-out transition-all duration-700">
          <span class="text-left">
						Заказ #{{ id }}
          </span>
          <span class="text-right" 
          :class="statusClass">
						{{ getStatusText(status) }}
          </span>
        </span>
      </div>
    </div>
  </div>
</template>