<script setup>
import { ref, computed } from 'vue'
import ChevronDown from '@/Components/Icons/ChevronDown.vue'
import Xmark from '@/Components/Icons/Xmark.vue'

const props = defineProps({
	modelValue: {
		type: Array,
		default: () => []
	},
	options: {
		type: Array,
		default: () => []
	},
	defaultValue: {
		type: String,
		default: 'Valitse vaihtoehto'
	}
})

const emit = defineEmits(['update:modelValue'])
const isOpen = ref(false)

const toggleDropdown = () => {
	isOpen.value = !isOpen.value
}

const selectOption = (option) => {
	const index = props.modelValue.indexOf(option)
	if (index === -1) {
		emit('update:modelValue', [...props.modelValue, option])
	} else {
		emit('update:modelValue', props.modelValue.filter(item => item !== option))
	}
}

const removeOption = (option) => {
	emit('update:modelValue', props.modelValue.filter(item => item !== option))
}

const isSelected = (option) => {
	return props.modelValue.includes(option)
}

// Filter options to exclude selected items
const filteredOptions = computed(() => {
	return props.options.filter(option => !isSelected(option))
})
</script>

<template>
  <div class="relative">
    <div
      class="flex items-center text-sm placeholder font-normal px-2 select-padding bg-white border border-gray-300 focus:border-gray-500 outline-none focus:outline-none rounded"
      @click="toggleDropdown"
    >
      <div class="flex-grow flex flex-wrap gap-1">
        <template v-if="modelValue.length">
          <div
            v-for="option in modelValue"
            :key="option.id || option.value"
            class="flex items-center gap-1.5 bg-gray-100 rounded px-2 py-1"
          >
            <span>{{ option.name || option }}</span>
            <Xmark
              class="w-3 h-3 stroke-2 cursor-pointer"
              @click.stop="removeOption(option)"
            />
          </div>
        </template>
        <template v-else>
          {{ defaultValue }}
        </template>
      </div>
      <ChevronDown class="w-3 h-3" />
    </div>
    <div
      v-if="isOpen"
      class="absolute left-0 right-0 z-10 bg-white border border-gray-100 rounded shadow-md"
    >
      <div
        v-for="option in options"
        :key="option.id || option.value"
        class="text-sm flex items-center p-2 cursor-pointer hover:bg-gray-100"
        @click.stop="selectOption(option)"
      >
        <span>{{ option.name || option }}</span>
      </div>
    </div>
  </div>
</template>