<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>

    <Head title="Профиль" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="leading-tight text-gray-800">
                Профиль
            </h2>
        </template>

        <div class="">
            <div class="mx-auto space-y-6 sm:px-6 lg:px-8 ">
                <div class="bg-white p-4 shadow-lg sm:rounded-lg sm:p-8 shadow-primary/40 border">
                    <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" />
                </div>

                <div class="bg-white p-4 sm:rounded-lg sm:p-8 shadow-lg shadow-primary/40 border">
                    <UpdatePasswordForm />
                </div>

                <div class="bg-white p-4 sm:rounded-lg sm:p-8 shadow-lg shadow-primary/40 border">
                    <DeleteUserForm />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
