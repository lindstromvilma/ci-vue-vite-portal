<script setup>
import PrimaryButton from './PrimaryButton.vue'
import SuccessButton from './SuccessButton.vue'

const props = defineProps({
	modalActive: {
		type: Boolean,
		required: true,
	},
})

defineEmits(['close'])
</script>

<template>
  <div
    v-show="modalActive"
    class="fixed inset-0 bg-black bg-opacity-25 flex items-center justify-center z-50"
  >
    <form
      v-if="modalActive"
      class="flex flex-col gap-4 bg-white px-6 py-8 mb-60 rounded shadow-md max-w-screen-md w-full"
    >
      <slot />
      <div class="flex gap-2 self-end">
        <PrimaryButton @click="$emit('close')">
          Sulje
        </PrimaryButton>
        <SuccessButton type="submit">
          Tallenna
        </SuccessButton>
      </div>
    </form>
  </div>
</template>