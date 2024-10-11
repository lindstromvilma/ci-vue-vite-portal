<script setup>
import Table from '@/Components/Table.vue'
import TableWithSorting from '@/Components/TableWithSorting.vue'

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

    <h3>Taulukko haulla ja sorttauksella sekä sarakkeiden näkyvyyden valinnalla</h3>
    <TableWithSorting :data="persons" />
    <br>
    <h3>Tavallinen taulukko sivutuksella</h3>
    <Table :data="persons" />
  </div>
</template>