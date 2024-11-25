<script setup>
import { computed } from 'vue'
import XMark from '@/Components/Icons/XMark.vue'

const props = defineProps({
	title: {
		type: String,
		required: true,
	},
	intent: {
		type: String,
		validator: (value) => ['info', 'success', 'danger', 'warning'].includes(value),
		default: 'info',
	},
	show: {
		type: Boolean,
		default: true,
	},
	dismiss: {
		type: Function,
	},
})

const containerClasses = computed(() => {
	switch (props.intent) {
		case 'success':
			return 'bg-success'
		case 'danger':
			return 'bg-danger'
		case 'warning':
			return 'bg-warning'
		case 'info':
		default:
			return 'bg-info'
	}
})

const buttonClasses = computed(() => {
	switch (props.intent) {
		case 'success':
			return 'hover:bg-success-600'
		case 'danger':
			return 'hover:bg-danger-600'
		case 'warning':
			return 'hover:bg-warning-600'
		case 'info':
		default:
			return 'hover:bg-info-600'
	}
})
</script>

<template>
  <div
    v-if="show"
    :class="`flex px-4 py-3 rounded space-x-3 w-full max-w-sm h-max ${containerClasses}`"
  >
    <div class="flex-1 space-y-2">
      <h1 class="font-medium">
        {{ title }}
      </h1>
      <div class="text-sm">
        <slot />
      </div>
    </div>
    <div class="shrink-0">
      <button
        :class="`cursor-pointer -mr-1 hover:rounded transition-all duration-150 ease-in-out ${buttonClasses}`"
        @click="dismiss"
      >
        <XMark
          class="w-6 h-6"
        />
      </button>
    </div>
  </div>
</template>