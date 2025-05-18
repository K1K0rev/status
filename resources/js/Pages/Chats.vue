<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
	<Head title="Чаты"/>
	<AuthenticatedLayout>
		<template #header>
            <h2>
                Чаты
            </h2>
    </template>
	</AuthenticatedLayout>
</template>