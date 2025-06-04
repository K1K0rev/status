<template>
	<div class="flex justify-between border-b items-center py-2">
		<label :for="name" class="block text-sm font-medium mb-1">{{ label }}</label>
		<div class="flex flex-col">
			<select
      :id="name"
      :value="modelValue"
      @change="$emit('update:modelValue', $event.target.value)"
      :required="required"
      class="rounded border-gray-300 focus:border-gray-300 focus:ring-0 text-primary"
			>
      <option value="" disabled>{{ placeholder }}</option>
      <option v-for="option in options" :key="option.value" :value="option.value">
				{{ option.label }}
      </option>
    </select>
		<p v-if="error" class="mt-1 text-sm text-red-600">{{ error }}</p>
	</div>
  </div>
</template>

<script setup>
defineProps({
  name: String,
  label: String,
  modelValue: String,
  options: {
    type: Array,
    required: true
  },
  placeholder: {
    type: String,
    default: 'Выберите вариант'
  },
  error: String,
  required: {
    type: Boolean,
    default: false
  }
});

defineEmits(['update:modelValue']);
</script>