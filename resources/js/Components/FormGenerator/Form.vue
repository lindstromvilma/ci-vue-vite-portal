<script setup>
import { reactive, defineAsyncComponent, onMounted } from 'vue'
import Field from './Field.vue'

const props = defineProps({
	form: {
		type: Object,
		default: () => ({}),
	}
})

const formData = reactive({})

// generate form data based on fields
const generateFormData = (fields) => {
	fields.forEach(field => {
		const key = field.savedTo || field.name
		formData[key] = ''
	})
}

// component mapping for dynamic imports based on field type
const componentMap = {
	text: () => defineAsyncComponent(() => import('../TextInput.vue')),
	select: () => defineAsyncComponent(() => import('../BaseSelect.vue')),
	date: () => defineAsyncComponent(() => import('../DatePicker.vue')),
}

// get component based on the field type
const getComponent = (field) => {
	return componentMap[field.type] ? componentMap[field.type]() : componentMap.text()
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
    <div class="flex flex-col gap-4">
      <Field
        v-for="(field, id) in form.fields"
        :id="field.savedTo"
        :key="id"
        :label="field.name"
      >
        <component
          :is="getComponent(field)"
          v-model="formData.savedTo"
          :field="field"
          :options="field.values"
          :required="field.required"
        />
      </Field>
    </div>
  </form>
</template>