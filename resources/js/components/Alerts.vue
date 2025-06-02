<script setup>
import { useAlertStore } from '@/stores/alert'
import { storeToRefs } from 'pinia';

const store = useAlertStore()
const { alerts } = storeToRefs(store)

const statusImages = {
  success: 'success.png',
  error: 'cross.png',
  info: 'info.png'
}
</script>

<template>
  <div class="fixed top-28 left-1/2 transform -translate-x-1/2 z-50">
    <transition-group name="alert" tag="div" class="flex flex-col gap-2">
      <div 
        v-for="alert in alerts" 
        :key="alert.id"
        class="flex items-center rounded-lg border px-4 py-2 text-lg shadow-md"
        :class="{
          'bg-white text-green-500 shadow-green-200': alert.type === 'success',
          'bg-red-100 border-red-400 text-red-700 shadow-red-100': alert.type === 'error',
          'bg-blue-100 border-blue-400 text-blue-700 shadow-blue-100': alert.type === 'info'
        }"
      >
        <img
          :src="`/images/icons/alerts/${statusImages[alert.type] || ''}`"
          alt=""
          class="mr-2 w-6 h-6"
        />
        {{ alert.message }}
      </div>
    </transition-group>
  </div>
</template>

<style scoped>
.alert-enter-active,
.alert-leave-active {
  transition: all 0.5s ease;
}

.alert-enter-from,
.alert-leave-to {
  opacity: 0;
  transform: translateY(-30px);
}

.alert-move {
  transition: transform 0.5s ease;
}
</style>