<script setup>
import { computed } from 'vue';

const props = defineProps({
  name: String,
  price: Number,
  icon: String,
  alt: String
})

const toUpperCase = computed(() => {
  if (!props.name) return ''
  return props.name.charAt(0).toUpperCase() + props.name.slice(1)
})

</script>

<template>
  <div class='flex mb-4 items-center text-2xl group'>
    <div class='flex w-full h-20 shadow-lg shadow-primary/30 border rounded-lg'>
      <div class='flex justify-between w-full items-center px-4'>
        <span
          class="flex justify-between items-center h-full w-full ease-in-out transition-all duration-700">
          <div class="flex gap-4 items-center">
            <img :src="icon" :alt="alt" class="h-12">
            <span  class="text-left">
              {{ toUpperCase }}
            </span>
          </div>
          <span class="text-right italic">
            ~{{ price }}руб.
          </span>
        </span>
      </div>
    </div>
   <span 
      class="group-hover:ml-4 opacity-0 w-0 overflow-hidden 
             group-hover:opacity-100 group-hover:w-6 
             transition-all duration-500 ease-in-out"
    >
      +
    </span>
  </div>
</template>