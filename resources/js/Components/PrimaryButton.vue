<script setup>
defineProps({
	type: {
		type: String,
		default: 'submit',
	},
	active: {
		type: Boolean,
		default: false,
	},
})
</script>

<template>
  <button
    :type="type"
    class="text-sm font-medium text-white text-center px-5 py-2 rounded bg-blue-600 hover:bg-blue-800 transition ease-in-out duration-150"
    :class="[{ 'bg-blue-800 !text-white': active }]"
  >
    <slot />
  </button>
</template>
