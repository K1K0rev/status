<template>
  <div class='flex justify-center mb-4'>
    <div class='flex w-full h-20 shadow-lg shadow-primary/30 border rounded-lg'>
      <div class='flex justify-between w-full items-center px-4'>
        <span
          class="grid grid-cols-[1fr_auto_1fr] items-center h-full text-2xl hover:text-3xl w-full ease-in-out transition-all duration-700">
          <span class="text-left">
            <slot name="name"></slot>
          </span>
          <span class="text-right italic">
          	<slot name="price"></slot>
          </span>
        </span>
      </div>
    </div>
  </div>
</template>