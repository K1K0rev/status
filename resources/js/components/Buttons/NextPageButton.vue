<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

defineProps({
	text: String,
	link: String
})
</script>

<template>
	<Link :href="route(link)" class="text-lg flex items-baseline">
		<span class="hover:text-xl transition-all easy-in-out duration-700">
			{{ text }}
		</span>
		<img src="/images/icons/arrows/double_arrow.png" alt="" class="h-3 w-3 ml-1">
	</Link>
</template>