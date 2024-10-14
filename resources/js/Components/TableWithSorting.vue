<script setup>
import { ref, computed } from 'vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import ArrowUpDown from '@/Components/Icons/ArrowUpDown.vue'

const props = defineProps({
	data: {
		type: Array,
		required: true,
	},
	columns: {
		type: Array,
		default: () => [],
	},
	showPerPage: {
		type: Number,
		default: 8,
	},
	actions: {
		type: Array,
		default: () => [
			{ label: 'Hyväksy', key: 'accept', condition: row => row.status === 'pending', style: 'bg-success-400 hover:bg-success' },
			{ label: 'Hylkää', key: 'reject', condition: row => row.status === 'pending', style: 'bg-danger-400 hover:bg-danger' },
			{ label: 'Muokkaa', key: 'edit', condition: () => true, style: 'bg-primary-400 hover:bg-primary' }
		]
	}
})

const currentPage = ref(1)
const sortingState = ref({ column: '', order: '' })
const searchQuery = ref('')
const columnVisibility = ref({})
const showDropdown = ref(false)

const filteredActions = (row) => {
	return props.actions.filter(action => action.condition(row))
}

// init column visibility
const initializeColumnVisibility = () => {
	const source = props.columns.length > 0 ? props.columns : Object.keys(props.data[0] || {})
	source.forEach(col => {
		const key = props.columns.length > 0 ? col.key : col
		columnVisibility.value[key] = true
	})
}

initializeColumnVisibility()

// visible columns based on user selection
const visibleColumns = computed(() => {
	return computedColumns.value.filter(column => columnVisibility.value[column.key])
})

// sort data
const sortedData = computed(() => {
	const { column, order } = sortingState.value
	if (!column) return props.data
	return [...props.data].sort((a, b) =>
		(a[column] > b[column] ? 1 : -1) * (order === 'asc' ? 1 : -1)
	)
})

// filter data based on search query
const filteredData = computed(() => {
	if (!searchQuery.value) return sortedData.value
	return sortedData.value.filter(row => {
		return Object.values(row).some(val => String(val).toLowerCase().includes(searchQuery.value.toLowerCase()))
	})
})

// paginated data
const paginatedData = computed(() => {
	const start = (currentPage.value - 1) * props.showPerPage
	const end = start + props.showPerPage
	return filteredData.value.slice(start, end)
})

// total pages for pagination
const totalPages = computed(() => Math.ceil(filteredData.value.length / props.showPerPage))
const hasPrevPage = computed(() => currentPage.value > 1)
const hasNextPage = computed(() => currentPage.value < totalPages.value)

// handle pagination
const handlePageChange = (direction) => {
	if (direction === 'prev' && hasPrevPage.value) {
		currentPage.value -= 1
	} else if (direction === 'next' && hasNextPage.value) {
		currentPage.value += 1
	}
}

const handlePageNumberClick = (page) => {
	currentPage.value = page
}

// handle sorting logic
const toggleSorting = (column) => {
	if (sortingState.value.column === column) {
		sortingState.value.order = sortingState.value.order === 'asc' ? 'desc' : 'asc'
	} else {
		sortingState.value.column = column
		sortingState.value.order = 'asc'
	}
}

// dynamic column generation
const computedColumns = computed(() => {
	if (props.columns.length > 0) {
		return props.columns
	} else if (props.data.length > 0) {
		return Object.keys(props.data[0]).map(key => ({ key, label: key.replace(/_/g, ' ') }))
	}
	return []
})
</script>

<template>
  <div class="max-w-6xl">
    <div class="flex items-center justify-between">
      <!-- search -->
      <div class="py-2 w-80">
        <TextInput
          v-model="searchQuery"
          type="text"
          placeholder="Hae taulukosta"
          class="border p-2 rounded-md"
        />
      </div>

      <!-- toggle columns -->
      <div class="relative">
        <PrimaryButton
          class="flex items-center space-x-2"
          @click="showDropdown = !showDropdown"
        >
          Näytä sarakkeet
        </PrimaryButton>
        <div
          v-if="showDropdown"
          class="flex flex-col gap-1 absolute right-0 z-20 mt-2 w-max px-4 py-3 bg-white border border-gray-300 rounded shadow"
        >
          <div
            v-for="(column, index) in computedColumns"
            :key="index"
          >
            <label class="flex items-center gap-2">
              <input
                v-model="columnVisibility[column.key]"
                type="checkbox"
              />
              <span>{{ column.label }}</span>
            </label>
          </div>
        </div>
      </div>
    </div>

    <!-- table -->
    <div class="relative overflow-x-auto">
      <div>
        <table class="divide-y divide-gray-200 bg-white text-sm">
          <thead class="bg-gray-50">
            <tr>
              <th
                v-for="(column, index) in visibleColumns"
                :key="index"
                class="whitespace-nowrap cursor-pointer"
                @click="toggleSorting(column.key)"
              >
                <div class="text-xs font-medium tracking-wide text-gray-900 text-left uppercase flex items-center justify-between gap-2 px-4 py-3">
                  {{ column.label }}
                  <ArrowUpDown class="h-4 w-4" />
                </div>
              </th>
              <th class="text-xs font-medium tracking-wide text-gray-900 text-left uppercase whitespace-nowrap px-4 py-3">
                Toiminnot
              </th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            <tr
              v-for="(row, rowIndex) in paginatedData"
              :key="rowIndex"
              class="hover:bg-gray-100"
            >
              <td
                v-for="(column, colIndex) in visibleColumns"
                :key="colIndex"
                class="whitespace-nowrap px-4 py-3 text-gray-700 text-left"
              >
                {{ row[column.key] }}
              </td>
              <!-- render action buttons based on action conditions -->
              <td class="whitespace-nowrap px-4 py-3 text-left">
                <div class="flex space-x-2">
                  <button
                    v-for="action in filteredActions(row)"
                    :key="action.key"
                    :class="`${action.style} text-white px-3 py-2 rounded`"
                    @click="$emit('row-action-click', { action: action.key, row })"
                  >
                    {{ action.label }}
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- pagination -->
    <div class="flex justify-between items-center px-4 py-3">
      <div class="text-sm text-gray-700">
        Sivu {{ currentPage }} / {{ totalPages }}
      </div>
      <ol class="flex gap-1 text-xs font-medium">
        <li>
          <a
            href="#edellinen"
            :class="[
              'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180 hover:bg-gray-200',
              { 'pointer-events-none opacity-50': !hasPrevPage }
            ]"
            @click.prevent="handlePageChange('prev')"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="size-3"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd"
              />
            </svg>
          </a>
        </li>

        <li
          v-for="page in totalPages"
          :key="page"
        >
          <a
            :href="`#sivu-${page}`"
            :class="[
              'inline-flex size-8 items-center justify-center rounded border border-gray-100 text-gray-900',
              { 'bg-sky-200 cursor-default': currentPage === page, 'bg-white hover:bg-primary-50': currentPage !== page }
            ]"
            @click.prevent="handlePageNumberClick(page)"
          >
            {{ page }}
          </a>
        </li>

        <li>
          <a
            href="#seuraava"
            :class="[
              'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 hover:bg-primary-50',
              { 'pointer-events-none opacity-50': !hasNextPage }
            ]"
            @click.prevent="handlePageChange('next')"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="size-3"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              />
            </svg>
          </a>
        </li>
      </ol>
    </div>
  </div>
</template>
