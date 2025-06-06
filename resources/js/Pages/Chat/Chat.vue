<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { format } from 'date-fns';
import { useForm } from '@inertiajs/vue3';
import { ref, computed, onMounted, nextTick, watch } from 'vue';

const { chat } = defineProps({
  chat: Object,
});

const ROLE = {
  ADMIN: 'admin',
  USER: 'user'
};

const roleRu = {
  [ROLE.ADMIN]: 'Поддержка',
  [ROLE.USER]: 'Вы'
};

const form = useForm({
  text: '',
});

const messagesContainer = ref(null);

// Автоматическая прокрутка к новым сообщениям
const scrollToBottom = () => {
  nextTick(() => {
    if (messagesContainer.value) {
      messagesContainer.value.scrollTop = messagesContainer.value.scrollHeight;
    }
  });
};

// Форматирование текста с заглавной буквы
const upperFirstLetter = computed({
  get: () => form.text,
  set: (value) => {
    if (value.length > 0) {
      form.text = value.charAt(0).toUpperCase() + value.slice(1);
    } else {
      form.text = value;
    }
  },
});

// Инициализация Echo и подписка на канал
onMounted(() => {
  scrollToBottom();
});

// Отправка сообщения
const submit = () => {
  form.post(route('chat.storeMessage', {chat: chat.id}), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset('text');
      scrollToBottom();
    },
  });
};
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h1>
        Чат по заказу
        <span class="bg-red-500 rounded px-2 text-white">
          #{{ chat.order_id }}
        </span>
      </h1>
    </template>

    <div class="flex flex-col flex-grow h-full min-h-0 border border-b-0 border-gray-200 shadow-lg shadow-primary/40 rounded">
      <div 
        ref="messagesContainer" 
        class="messages-container flex-grow min-h-0 h-60 overflow-auto p-4 space-y-2"
      >
        <div 
          v-for="message in chat.messages" 
          :key="message.id" 
          class="flex-grow min-h-0 bg-white overflow-auto m-4"
        >
          <div 
            class="flex flex-col w-fit max-w-[30%]" 
            :class="message.user.role === 'admin' ? 'mr-auto' : 'ml-auto'"
          >
            <div class="text-xs">
              {{ roleRu[message.user.role] }}
            </div>
            <div>
              <div class="grid grid-cols-[1fr_auto] gap-1 bg-blue-200 rounded p-1">
                <div class="break-words m-1">
                  {{ message.text }}
                </div>
                <div class="self-end text-xs text-right">
                  {{ format(new Date(message.created_at), 'HH:mm') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <form 
        @submit.prevent="submit" 
        class="sticky bottom-0 bg-primary border-gray-200 p-2 rounded-b"
      >
        <div class="flex items-center">
          <label for="text" />
          <input 
            type="text" 
            id="text" 
            v-model="upperFirstLetter" 
            required
            placeholder="Наберите сообщение..." 
            autocomplete="off"
            class="flex-grow w-full p-2 m-2 rounded border border-primary/20 shadow-lg shadow-primary/20 outline-none focus:ring-0 focus:border-primary/60 focus:outline-none"
          >
          <button type="submit" :disabled="form.processing">
            <img src="/images/icons/send.png" alt="" class="h-10 mx-2">
          </button>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>