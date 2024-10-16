<script setup>
import FormGenerator from '@/Components/FormGenerator.vue'

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
    <!-- formi generoidaan datasta joka välitetään näkymään -->
    <FormGenerator :form="form" />
  </div>
</template>