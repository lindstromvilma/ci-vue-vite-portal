<script setup>
const props = defineProps({
	modelValue: [String],
	options: {
		type: Array,
		default: () => []
	},
	defaultValue: {
		type: String,
		default: 'Valitse vaihtoehto'
	}
});

const emit = defineEmits(['update:modelValue'])
function updateValue(value) {
	emit('update:modelValue', value)
}
</script>

<template>
  <select
    :value="modelValue"
    class="border-gray-300 text-sm placeholder font-normal w-full px-1.5 select-padding border focus:border-gray-500 focus:ring-0 focus:ring-gray-500 rounded"
    @change="updateValue($event.target.value)"
  >
    <option
      value=""
    >
      {{ defaultValue }}
    </option>
    <option
      v-for="option in options"
      :key="option.id"
      :value="option.id || option.value"
    >
      {{ option.name || option }}
    </option>
  </select>
</template>