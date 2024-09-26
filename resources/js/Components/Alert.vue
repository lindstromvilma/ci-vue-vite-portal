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
		validator: (value) => ['info', 'success', 'danger'].includes(value),
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
			return 'bg-success-100'
		case 'danger':
			return 'bg-danger-100'
		case 'info':
		default:
			return 'bg-info-100'
	}
})

const buttonClasses = computed(() => {
	switch (props.intent) {
		case 'success':
			return 'hover:bg-success-300'
		case 'danger':
			return 'hover:bg-danger-300'
		case 'info':
		default:
			return 'hover:bg-info-300'
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
        :class="`cursor-pointer hover:rounded -mr-1 ${buttonClasses}`"
        @click="dismiss"
      >
        <XMark
          class="w-6 h-6"
        />
      </button>
    </div>
  </div>
</template>