<template>
  <div class="relative inline-block">
    <slot name="trigger"></slot>
    <div
      v-if="visible"
      class="absolute z-10 w-64 p-2 mt-2 text-sm text-white bg-black rounded shadow-lg"
      :style="{ top: position.top, left: position.left }"
    >
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

const props = defineProps({
	position: {
		type: Object,
		default: () => ({ top: '100%', left: '50%' })
	}
})

const visible = ref(false)

function show() {
	visible.value = true
}

function hide() {
	visible.value = false
}

onMounted(() => {
	document.addEventListener('click', hide)
})

onBeforeUnmount(() => {
	document.removeEventListener('click', hide)
})
</script>
