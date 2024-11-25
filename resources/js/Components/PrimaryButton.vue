<script setup>
defineProps({
	type: {
		type: String,
		default: 'button',
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
    class="text-sm font-medium text-center px-5 py-2 rounded bg-accent hover:bg-accent-600 transition ease-in-out duration-150"
    :class="[{ 'bg-accent-600': active }]"
  >
    <slot />
  </button>
</template>
