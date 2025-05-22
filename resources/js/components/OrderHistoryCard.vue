<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

const order = defineProps({
  title: String,
  description: String
})

</script>

<template>
  <div class='flex justify-center mb-4'>
    <div class='flex w-full h-20 shadow-lg shadow-primary/30 border rounded-lg'>
      <div class='flex justify-between w-full items-center px-4'>
        <span
          class="grid grid-cols-[1fr_auto_1fr] items-center h-full text-2xl">
          <span class="text-left">
            {{ order.title }}
          </span>
        </span>
      </div>
    </div>
  </div>
</template>