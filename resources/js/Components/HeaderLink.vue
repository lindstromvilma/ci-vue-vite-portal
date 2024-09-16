<script setup>
const props = defineProps({
	text: {
		type: String,
		required: true,
	},
	href: {
		type: String,
		required: false,
	},
});
</script>

<template>
  <a
    :href="href"
    class="cursor-pointer hover:underline transition-all ease-in-out duration-300"
  >
    {{ text }}
  </a>
</template>