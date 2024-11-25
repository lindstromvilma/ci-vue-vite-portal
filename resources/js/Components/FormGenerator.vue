<script setup>
import { reactive, ref, defineAsyncComponent, onMounted } from 'vue'
import InputLabel from './InputLabel.vue'
import InputError from './InputError.vue'

const props = defineProps({
	form: {
		type: Object,
		default: () => ({}),
	}
})

const formData = reactive({})
const errors = ref([])

// generate form data based on fields
const generateFormData = (fields) => {
	fields.forEach(field => {
		const key = field.savedTo || field.name
		formData[key] = field.type === 'multiselect' ? [] : ''
	})
}

// component mapping for dynamic imports based on field type
const componentMap = {
	text: defineAsyncComponent(() => import('./TextInput.vue')),
	select: defineAsyncComponent(() => import('./BaseSelect.vue')),
	multiselect: defineAsyncComponent(() => import('./MultiSelect.vue')),
	date: defineAsyncComponent(() => import('./DatePicker.vue')),
	textarea: defineAsyncComponent(() => import('./TextArea.vue')),
}

// get component based on the field type
const getComponent = (field) => {
	return componentMap[field.type] || componentMap.text
}

onMounted(() => {
	if (props.form.fields) {
		generateFormData(props.form.fields)
	}
})
</script>

<template>
  <form class="flex flex-col gap-8">
    <h2>
      {{ form.name }}
    </h2>
    <div class="flex flex-col flex-nowrap md:flex-row md:flex-wrap gap-4">
      <div
        v-for="(field, id) in form.fields"
        :key="id"
        class="w-full md:w-2/5"
      >
        <InputLabel
          :value="field.name"
        />
        <component
          :is="getComponent(field)"
          v-model="formData[field.savedTo]"
          :field="field"
          :options="field.values"
          :required="field.required"
        />
        <InputError :errors="errors" />
      </div>
    </div>
  </form>
</template>