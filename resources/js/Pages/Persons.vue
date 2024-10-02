<script setup>
import { ref } from 'vue'
import Table from '@/Components/Table.vue'

const props = defineProps({
	message: {
		type: String,
		required: true,
	},
	persons: {
		type: Array,
		default: () => [],
	},
})
</script>

<template>
  <div class="flex flex-col gap-10 w-full max-w-screen-2xl">
    <h1 class="text-2xl font-normal">
      {{ message }}
    </h1>

    <Table :data="persons" />
  </div>
</template>