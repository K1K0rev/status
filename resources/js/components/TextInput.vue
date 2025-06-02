<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel();

const props = defineProps({
    placeholder: {
        type: String,
        default: ''
    },
    autofocus: {
        type: Boolean,
        default: false
    }
})

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="rounded-md border-gray-300 shadow-sm focus:ring-0 focus:border-gray-500"
        v-model="model"
        ref="input"
        :placeholder="placeholder"
    />
</template>
