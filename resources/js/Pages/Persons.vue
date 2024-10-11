<script setup>
import SimpleTabs from '@/components/SimpleTabs.vue'
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

const tabs = [
	{ label: 'Tavallinen taulukko', value: 'basic-table' },
	{ label: 'Data taulukko', value: 'sortable-table' },
]
</script>

<template>
  <div class="flex flex-col gap-10 w-full max-w-screen-2xl">
    <h1 class="text-2xl font-normal">
      {{ message }}
    </h1>

    <SimpleTabs :tabs="tabs">
      <template #basic-table>
        <Table :data="persons" />
      </template>
      <template #sortable-table>
        <TableWithSorting :data="persons" />
      </template>
    </SimpleTabs>
  </div>
</template>