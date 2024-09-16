<script setup>
const props = defineProps({
	text: {
		type: String,
		required: true,
	},
	href: {
		type: String,
		required: false,
		default: '#',
	},
	active: {
		type: Boolean,
		required: false,
		default: false,
	},
})
</script>

<template>
  <a
    :href="href"
    :class="[
      'cursor-pointer hover:bg-blue-50 w-full py-1 pl-8 pr-4 transition-all ease-in-out duration-200',
      { 'bg-blue-300': props.active }
    ]"
  >
    {{ text }}
  </a>
</template>