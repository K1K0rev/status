<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';
import { route } from 'ziggy-js'
import { ref } from 'vue';
import { debounce } from 'lodash';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FormButton from '@/Components/Buttons/FormButton.vue';
import InputField from './Partial/InputField.vue';
import CheckboxField from './Partial/CheckboxField.vue';
import SelectField from './Partial/SelectField.vue';
import { watch } from 'vue';
import { onBeforeUnmount } from 'vue';

const props = defineProps({
	cartItems: Object,
	total: Number,
	initialCalculatedTotal: Number
})

const form = useForm({
	height: 0,
	surface_area: 0,
	rent_equipment: false,
	complexity: '',
	accessibility_surface: '',
	accessibility_workplace: '',
	protect_other_components: false,
	schedule: false,
	combined_work: false,
	start_date: '',
	end_date: ''
});

const heightNeeded = ref(false)

const accessibilityOptions = [
	{ value: 'свободное', label: 'Свободное' },
	{ value: 'затрудненное', label: 'Затрудненное' },
	{ value: 'критическое', label: 'Критическое' }
]

const calculatedTotal = ref(props.initialCalculatedTotal || props.total);
const isCalculating = ref(false);

const updateCalculation = debounce(() => {
	router.post(route('cart.calculate'), form.data(), {
		preserveScroll: true,
		preserveState: true,
		only: ['calculatedTotal'],
		onSuccess: (page) => {
			calculatedTotal.value = page.props.calculatedTotal || props.total;
		},
		onError: (error) => {
			console.error('Ошибка при расчёте цены', error);
		}
	});
}, 500);

watch(form, updateCalculation, { deep: true });

onBeforeUnmount(() => {
	updateCalculation.cancel();
});

const submitOrder = () => {
	form.post(route('cart.store'), {
		preserveScroll: true,
		onSuccess: () => {
			router.visit(route('orders'));
		},
	});
};

const updateQuantity = (service_id, quantity) => {
	router.put(route('cart.update', service_id), {
		quantity: quantity
	}, {
		preserveScroll: true,
	})
}

const deleteItem = (service_id) => {
	router.delete(route('cart.destroy', service_id), {
		preserveScroll: true,
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
		<div v-if="cartItems?.services?.length"
			class="bg-white overflow-hidden shadow-lg shadow-primary/30 border rounded-lg">
			<form @submit.prevent="submitOrder" class="p-6 bg-white border-b border-gray-200">
				<div v-for="service in cartItems.services" :key="service.id" class="flex items-center py-4 border-b">
					<img :src="service.img" class="w-20 h-20 rounded object-cover mr-4">
					<div class="flex-1">
						<h3 class="font-medium">{{ service.name }}</h3>
						<p class="text-gray-600">{{ service.price }} ₽</p>
					</div>
					<div class="flex flex-col items-end gap-4">
						<div class="flex items-center gap-4">
							<span>Количество объектов:</span>
							<input type="number" v-model="service.pivot.quantity" min="1" max="10"
								@change="updateQuantity(service.id, service.pivot.quantity)" class="w-16 text-center border rounded">
						</div>
						<button @click="deleteItem(service.id)" type="button" class="text-red-500 hover:text-red-700">
							Удалить
						</button>
					</div>
				</div>

				<div class="flex flex-col py-4">

					<span class="text-lg mb-1">Дополнительные параметры заказа:</span>

					<CheckboxField name="height" label="Нужно ли работать на высоте:" v-model="heightNeeded"
						:error="form.errors.height" />

					<div v-if="heightNeeded" class="transition-opacity duration-300"
						:class="{ 'opacity-100': heightNeeded, 'opacity-0': !heightNeeded }">
						<InputField name="height" label="Укажите высоту (в метрах)" type="number" v-model="form.height"
							:error="form.errors.height" step="1" max="100" required />
					</div>

					<InputField name="surface_area" label="Площадь обработки (в метрах³):" type="number"
						v-model="form.surface_area" :error="form.errors.surface_area" step="1" min="100" max="100000" required />

					<SelectField name="complexity" label="Сложность выполнения работ:" v-model="form.complexity"
						:error="form.errors.complexity" :options="[
							{ value: 'легкая', label: 'Легкая' },
							{ value: 'средняя', label: 'Средняя' },
							{ value: 'сложная', label: 'Сложная' }
						]" required />

					<SelectField name="accessibility_surface" label="Сложность доступа к
							обрабатываемой поверхности:" v-model="form.accessibility_surface" :error="form.errors.accessibility_surface"
						:options="accessibilityOptions" required />

					<SelectField name="accessibility_workplace" label="Сложность доступа к метсу
							работы:" v-model="form.accessibility_workplace" :error="form.errors.accessibility_workplace"
						:options="accessibilityOptions" required />

					<CheckboxField name="protect_other_components" label="Нужно ли укрытие для
							защиты
							окружения:" v-model="form.protect_other_components" :error="form.errors.protect_other_components" required />

					<CheckboxField name="schedule" label="Имеется ли график разрешения для
							работы:" v-model="form.schedule" :error="form.errors.schedule" required />

					<CheckboxField name="combined_work" label="Будут ли совмещенные работы с
							другими
							организациями:" v-model="form.combined_work" :error="form.errors.combined_work" required />

					<InputField name="start_date" label="Дата начала работ:" type="date" v-model="form.start_date"
						:error="form.errors.start_date" required />

					<InputField name="end_date" label="Дата окончания работ:" type="date" v-model="form.end_date"
						:error="form.errors.end_date" required />

					<CheckboxField name="rent_equipment" label="Нужна ли аренда оборудования:" v-model="form.rent_equipment"
						:error="form.errors.rent_equipment" required class="border-b-0"/>

				</div>

				<div class="mt-6 flex justify-between items-center">
					<FormButton @click="submitOrder">
						{{ isCalculating ? 'Подождите...' : 'Оформить заказ' }}
					</FormButton>
					<div class="text-xl font-bold">
						{{ isCalculating ? 'Пересчет...' : `Предварительная стоимость: ${calculatedTotal} ₽` }}
					</div>
				</div>
				<div class="w-full flex justify-end">
					<span class="text-sm text-gray-500">Окончательная стоимость будет известна после уточнения всех аспектов
						заказа и
						составления сметы</span>
				</div>
			</form>
		</div>

		<div v-else class="h-full text-center">
			<p class="text-gray-500">Ваша корзина пуста</p>
		</div>

	</AuthenticatedLayout>
</template>