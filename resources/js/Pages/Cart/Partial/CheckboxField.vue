<template>
  <div class="flex justify-between border-b items-center py-2">
    <label :for="name" class="block text-sm font-medium mb-1">{{ label }}</label>
    <div class="flex flex-col">
      <p v-if="error" class="mt-1 text-sm text-red-600">{{ error }}</p>
      <input type="checkbox" :id="name" :checked="modelValue || false"
        @change="$emit('update:modelValue', $event.target.checked)" :required="required"
        class="rounded border-gray-300 focus:border-gray-500 focus:ring-0 text-primary">
      <p v-if="error" class="mt-1 text-sm text-red-600">{{ error }}</p>
    </div>
  </div>
</template>

<script setup>
defineProps({
  name: String,
  label: String,
  modelValue: {
    type: Boolean,
    default: false
  },
  error: String,
  required: {
    type: Boolean,
    default: false
  }
});

defineEmits(['update:modelValue']);
</script>