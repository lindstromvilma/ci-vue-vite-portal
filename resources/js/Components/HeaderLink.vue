<script setup>
import { defineProps } from 'vue'

const props = defineProps({
	text: {
		type: String,
		required: true,
	},
	href: {
		type: String,
		required: false,
	},
	icon: {
		type: Object,
		required: false,
	},
})
</script>

<template>
  <a
    :href="href"
    class="font-normal cursor-pointer subpixel-antialiased flex items-center gap-2"
  >
    <component
      :is="icon"
      v-if="icon"
      class="h-5 w-5"
    />
    {{ text }}
  </a>
</template>