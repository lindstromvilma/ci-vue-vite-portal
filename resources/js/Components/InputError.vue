<script setup>
defineProps({
	message: {
		type: String,
	},
});
</script>

<template>
  <div v-if="message">
    <p class="font-medium text-xs text-red-400">
      {{ message }}
    </p>
  </div>
</template>
