<script setup>
import Form from '@/Components/FormGenerator/Form.vue'

const props = defineProps({
	message: {
		type: String,
	},
	form: {
		type: Object,
		default: () => ({}),
	},
})
</script>

<template>
  <div class="flex flex-col gap-10 w-full max-w-screen-2xl">
    <h1>{{ message }}</h1>
    <!-- generoitu formi -->
    <Form :form="form" />
  </div>
</template>