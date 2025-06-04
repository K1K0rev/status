<template>
  <div class="flex justify-between border-b items-center py-2">
		<label :for="name" class="block text-sm font-medium mb-1">{{ label }}</label>
		<div class="flex flex-col">
			<input
			:type="type"
			:id="name"
			:value="modelValue"
			@input="$emit('update:modelValue', $event.target.value)"
			:step="step"
			:min="Number(min)"
			:max="Number(max)"
			:required="required"
			class="rounded border-gray-300 focus:border-gray-500 focus:ring-0 text-primary"
			>
			<p v-if="error" class="mt-1 text-sm text-red-600">{{ error }}</p>
		</div>
  </div>
</template>

<script setup>
defineProps({
  name: String,
  label: String,
  type: {
    type: String,
    default: 'text'
  },
  modelValue: [String, Number],
  error: String,
  step: {
    type: String,
    default: '1'
  },
  min: {
    type: [Number, String],
    default: 0
  },
	max: {
    type: [Number, String],
    default: 100
  },
  required: {
    type: Boolean,
    default: false
  }
});

defineEmits(['update:modelValue']);
</script>