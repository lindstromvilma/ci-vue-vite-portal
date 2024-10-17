<script setup>
import PrimaryButton from './PrimaryButton.vue'

const props = defineProps({
	modalActive: {
		type: Boolean,
		required: true,
	},
})
</script>

<template>
  <div
    v-show="modalActive"
    class="fixed inset-0 bg-black bg-opacity-20 flex items-center justify-center z-50"
  >
    <div
      v-if="modalActive"
      class="flex flex-col gap-4 bg-white px-6 py-8 mb-60 rounded shadow-md max-w-screen-md w-full"
    >
      <slot />
      <PrimaryButton
        class="self-end"
        @click="$emit('close')"
      >
        Sulje
      </PrimaryButton>
    </div>
  </div>
</template>