<script setup>
import { onMounted, ref } from 'vue'

const props = defineProps({
	placeholder: {
		type: String,
		default: 'Kirjoita tähän',
	},
});

const model = defineModel({
	type: [ String, Number ],
	default: '',
});

const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute('autofocus')) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <input
    ref="input"
    v-model="model"
    :placeholder="placeholder"
    class="text-sm font-normal w-full px-2.5 py-2 border border-gray-300 focus:border-gray-500 outline-none focus:outline-none rounded"
  />
</template>
