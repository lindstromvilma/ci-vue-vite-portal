<script setup>
import { ref } from 'vue'
import QuestionMark from './Icons/QuestionMark.vue'

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
    <QuestionMark
      class="h-7 cursor-pointer focus:outline-none"
      type="button"
      @focusout="visible = false"
      @click="toggle()"
    />
    <div
      v-show="visible"
      class="absolute right-full bg-white z-50 font-normal text-sm text-left no-underline rounded py-2 px-3 mr-4 w-56 border border-gray-300 shadow"
    >
      {{ content }}
    </div>
  </div>
</template>
