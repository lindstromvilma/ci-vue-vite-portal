<script setup>
import { ref, watch } from 'vue'
import SimpleTabs from '@/components/SimpleTabs.vue'
import Table from '@/Components/Table.vue'
import TableWithSorting from '@/Components/TableWithSorting.vue'
import BaseModal from '@/Components/BaseModal.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'

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

const modalActive = ref(false)
const selectedRow = ref(null)

const toggleModal = () => {
	modalActive.value = !modalActive.value
}

const handleRowActionClick = ({ action, row }) => {
	if (action === 'edit') {
		selectedRow.value = { ...row }
		toggleModal()
	}
}

const closeModal = () => {
	modalActive.value = false
}

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
        <TableWithSorting
          :data="persons"
          @row-action-click="handleRowActionClick"
        />
        <BaseModal
          :modal-active="modalActive"
          @close="closeModal"
        >
          <h1 class="text-2xl font-semibold mb-4">
            Muokkaa tietoja
          </h1>
          <div>
            <InputLabel
              for="email"
              value="Uusi sähköposti"
            />
            <TextInput
              id="email"
              v-model="selectedRow.email"
              placeholder="Kirjoita sähköposti"
            />
          </div>
          <div>
            <InputLabel
              for="phone"
              value="Uusi puhelinnumero"
            />
            <TextInput
              id="phone"
              v-model="selectedRow.phone"
              placeholder="Kirjoita puhelinnumero"
            />
          </div>
        </BaseModal>
      </template>
    </SimpleTabs>
  </div>
</template>