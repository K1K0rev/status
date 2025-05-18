<template>
	<div class='h-auto flex shadow-lg shadow-primary/30 border rounded-lg'>
		<div class='flex w-full flex-col items-center text-xl gap-2'>
			<slot name="img"></slot>
			<div class="my-6">
				<slot name="name"></slot>
			</div>
		</div>
	</div>
</template>