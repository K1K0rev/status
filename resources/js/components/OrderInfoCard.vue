<script setup>
const status = defineProps({
  src: String,
  alt: String,
  title: String,
  animate: {
    type: Boolean,
    default: false
  }
})

</script>

<template>

  <div class="flex h-32 bg-primary border rounded-lg justify-center items-center">
    <div class="flex justify-center">
      <img :src="status.src" :alt="status.alt" :class="['w-16', {'animate-[pulse_2.5s_linear_infinite]' : animate}]">
    </div>
  </div>

</template>

<style>

@keyframes pulse {
  0% {
    transform: scale(1.2);
  }
  50% {
    transform: scale(1);
  }
  100% {
    transform: scale(1.2);
  }
}

</style>