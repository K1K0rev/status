<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ChatCard from '@/Components/Cards/ChatCard.vue';
import { route } from 'ziggy-js';

const { chats } = defineProps({
	chats: Object
})

</script>

<template>

	<Head title="Чаты" />
	<AuthenticatedLayout>
		<template #header>
			<h2>
				Чаты
			</h2>
		</template>

		<div v-if="chats.length > 0">
			<ul>
				<li v-for="chat in chats" :key="chat.id">
					<Link :v-if="chat.status === 'active'" :href="route('chat.show', chat.id)">
						<ChatCard :id="chat.order_id" :status="chat.status" />
					</Link>
				</li>
			</ul>
		</div>
		<div v-else class="h-full text-center">
			<p class="text-gray-500">Нет активных чатов</p>
		</div>
	</AuthenticatedLayout>
</template>