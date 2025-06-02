<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
  section: Object
});

const root = ref(null);

onMounted(() => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  if (root.value) {
    observer.observe(root.value);
  }
});
</script>

<template>
  <div ref="root" class="lazy-section">
    <component :is="section.component" v-bind="section.props" />
  </div>
</template>

<style>
.lazy-section {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.1s ease, transform 0.1s ease;
}

.lazy-section.visible {
  opacity: 1;
  transform: translateY(0);
}
</style>