<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

defineProps({
	link: String
})
</script>

<template>
	<Link :href="route(link)" class="text-lg flex items-baseline">
		<div class="flex items-center gap-1 hover:text-xl transition-all easy-in-out duration-700">
			<img src="/images/icons/arrows/double_arrow.png" alt="Стрелка назад" class="h-3 w-3 ml-1 rotate-180">
			Назад
		</div>
	</Link>
</template> 