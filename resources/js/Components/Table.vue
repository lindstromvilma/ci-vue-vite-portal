<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
	data: {
		type: Array,
		required: true,
	},
	showPerPage: {
		type: Number,
		default: 8,
	},
})

const currentPage = ref(1)

const paginatedData = computed(() => {
	const start = (currentPage.value - 1) * props.showPerPage
	const end = start + props.showPerPage
	return props.data.slice(start, end)
})

const totalPages = computed(() => {
	return Math.ceil(props.data.length / props.showPerPage)
})

const hasPrevPage = computed(() => currentPage.value > 1)
const hasNextPage = computed(() => currentPage.value < totalPages.value)

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

const columns = computed(() => {
	if (props.data.length > 0) {
		return Object.keys(props.data[0]).map(key => key.replace(/_/g, ' '))
	}
	return []
})

const columnKeyMap = computed(() => {
	const map = {}
	if (props.data.length > 0) {
		Object.keys(props.data[0]).forEach(key => {
			const transformedKey = key.replace(/_/g, ' ')
			map[transformedKey] = key
		})
	}
	return map
})
</script>

<template>
  <div>
    <div class="overflow-x-auto">
      <!-- table head -->
      <table class="divide-y divide-gray-200 bg-white text-sm w-full">
        <thead class="bg-gray-50">
          <tr>
            <th
              v-for="(column, index) in columns"
              :key="index"
              class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 text-left capitalize"
            >
              {{ column }}
            </th>
          </tr>
        </thead>
        <!-- table body -->
        <tbody class="divide-y divide-gray-200">
          <tr
            v-for="(row, rowIndex) in paginatedData"
            :key="rowIndex"
          >
            <td
              v-for="(column, colIndex) in columns"
              :key="colIndex"
              class="whitespace-nowrap px-4 py-3 text-gray-700 text-left"
            >
              {{ row[columnKeyMap[column]] }}
            </td>
          </tr>
        </tbody>
      </table>
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
              'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180 hover:bg-accent',
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
              { 'bg-accent cursor-default': currentPage === page, 'bg-white hover:bg-accent': currentPage !== page }
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
              'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 hover:bg-accent',
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