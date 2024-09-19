<script setup>
import { ref } from 'vue'

const props = defineProps({
	content: {
		type: String,
		default: '',
	},
})

const visible = ref(false)

function toggle() {
	visible.value = !visible.value
}
</script>

<template>
  <div class="relative flex items-center gap-4">
    <button
      class="text-white font-bold text-base subpixel-antialiased px-4 py-2 rounded-full bg-blue-300 active:bg-blue-400 hover:bg-blue-400 outline-none focus:outline-none ease-linear transition-all duration-150"
      type="button"
      @focusout="visible = false"
      @click="toggle()"
    >
      ?
    </button>
    <div
      v-show="visible"
      class="absolute right-full bg-white z-50 font-normal text-sm text-left no-underline rounded py-2 px-3 mr-4 w-56 border border-gray-300 shadow"
    >
      {{ content }}
    </div>
  </div>
</template>
