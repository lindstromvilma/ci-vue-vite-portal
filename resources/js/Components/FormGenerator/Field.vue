<script setup>
import InputLabel from '../InputLabel.vue'
import InputError from '../InputError.vue'

const props = defineProps({
	label: String,
	id: String,
	errors: {
		type: Array,
		default: () => [],
	},
})
</script>

<template>
  <div>
    <InputLabel
      :for="id"
      :value="label"
    />
    <slot />
    <InputError :errors="errors" />
  </div>
</template>