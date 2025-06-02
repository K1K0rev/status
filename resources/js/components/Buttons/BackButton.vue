<template>
    <button class="rounded-lg flex w-auto h-max items-center gap-2 p-2 tracking-wide group">
        <img src="/images/icons/arrows/arrow_btn.png" alt="Стрелка назад" class="w-8 h-auto group-hover:scale-110 duration-500 transition-all ease-in-out">
        <span class="inline-block uppercase text-primary group-hover:text-xl font-extrabold duration-500 transition-all ease-in-out"><slot></slot></span>
    </button>
</template>
