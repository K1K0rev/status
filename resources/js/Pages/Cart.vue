<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { route } from 'ziggy-js'
import FormButton from '@/Components/FormButton.vue';

const props = defineProps({
	cartItems: {
		type: Object,
	},
	total: Number
})

const form = useForm({});

const submitOrder = () => {
    form.post(route('orders.store'), {
        onSuccess: () => {
          $inertia.delete(route('cart.clear'));
        },
    });
};
</script>

<template>

	<Head title="Корзина" />

	<AuthenticatedLayout>
		<template #header>
			<h2>
				Корзина
			</h2>
		</template>
		<div v-if="cartItems?.services?.length" class="bg-white overflow-hidden shadow-lg shadow-primary/30 border rounded-lg">
			<form @submit.prevent="submitOrder" class="p-6 bg-white border-b border-gray-200">
				<div v-for="service in cartItems.services" :key="service.id" class="flex items-center py-4 border-b">
					<img :src="service.img" class="w-20 h-20 object-cover mr-4">
					<div class="flex-1">
						<h3 class="font-medium">{{ service.name }}</h3>
						<p class="text-gray-600">{{ service.price }} ₽</p>
					</div>
					<div class="flex items-center">
						<input type="number" v-model="service.pivot.quantity" min="1"
							@change="$inertia.put(route('cart.update', service.id), { quantity: service.pivot.quantity })"
							class="w-16 text-center border rounded">
						<button @click="$inertia.delete(route('cart.destroy', service.id))"
							class="ml-4 text-red-500 hover:text-red-700">
							Удалить
						</button>
					</div>
				</div>

				<div class="mt-6 flex justify-between items-center">
					<FormButton :disabled="form.processing">
						Оформить заказ
					</FormButton>
					<div class="text-xl font-bold">
						Итого: {{ total }} ₽
					</div>
				</div>
			</form>
		</div>

		<div v-else class="h-full text-center">
			<p class="text-gray-500">Ваша корзина пуста</p>
		</div>

	</AuthenticatedLayout>
</template>