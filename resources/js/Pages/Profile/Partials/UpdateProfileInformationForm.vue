<script setup>
import InputError from '@/Components/Inputs/InputError.vue';
import InputLabel from '@/Components/Inputs/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    fullname: user.fullname,
    login: user.login,
    email: user.email,
    date_of_birth: user.date_of_birth,
    phone: user.phone
});

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Информация о профиле
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Обновите данные своего профиля
            </p>
        </header>

        <form
            @submit.prevent="form.patch(route('profile.update'))"
            class="mt-6 space-y-6"
        >
            <div>
                <InputLabel for="fullname" value="Имя" />

                <TextInput
                    id="fullname"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.fullname"
                    required
                    autofocus
                    autocomplete="off"
                    placeholder="Введите свое ФИО"
                />

                <InputError class="mt-2" :message="form.errors.fullname" />
            </div>

            <div>
                <InputLabel for="login" value="Логин" />

                <TextInput
                    id="login"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.login"
                    required
                    autocomplete="off"
                    placeholder="Введите свой логин"
                />

                <InputError class="mt-2" :message="form.errors.login" />
            </div>

            <div>
                <InputLabel for="email" value="Почта" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    placeholder="Введите свою почту"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="date_of_birth" value="Дата рождения" />

                <TextInput
                    id="date_of_birth"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.date_of_birth"
                    required
                    autocomplete="off"
                    placeholder="Укажите дату рождения"
                />

                <InputError class="mt-2" :message="form.errors.date_of_birth" />
            </div>

            <div>
                <InputLabel for="phone" value="Телефон" />

                <TextInput
                    id="phone"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.phone"
                    required
                    autocomplete="off"
                    placeholder="Укажите свой телефон"
                />

                <InputError class="mt-2" :message="form.errors.phone" />
            </div>

            <div v-if="user.email_verified_at === null">
                <p class="mt-2 text-sm text-gray-800">
                    Ваша почта не подтверждена.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none"
                    >
                        Нажмите здесь, чтобы отправить электронное письмо с проверкой.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 text-sm font-medium text-green-600"
                >
                    Ссылка на проверку была отправлена ​​на ваш адрес электронной почты.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Сохранить</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Сохранено
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
