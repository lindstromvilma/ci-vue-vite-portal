<script setup>
import { ref } from 'vue'
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import XMark from '@/Components/Icons/XMark.vue'

const props = defineProps({
	message: {
		type: String,
		required: true,
	},
	list: {
		type: Array,
		default: () => [],
	},
})

const item = ref('')
const errors = ref('')
const isSubmitting = ref(false)
const list = ref(props.list || [])

const addItem = () => {
	if (item.value.trim() === '') {
		errors.value = 'Kirjoita jotain lisättäväksi listalle'
		return
	}

	list.value.push(item.value)
	item.value = ''
	errors.value = ''
}

const removeItem = (index) => {
	list.value.splice(index, 1)
}
</script>

<template>
  <div class="flex flex-col gap-10 text-black w-full max-w-screen-2xl">
    <h1 class="text-2xl font-normal">
      {{ message }}
    </h1>
    <div class="flex flex-col self-center gap-10 w-full">
      <div class="flex flex-col gap-6">
        <div class="w-full">
          <InputLabel
            for="item"
            value="Listaan lisättävä asia"
          />
          <TextInput
            id="item"
            v-model="item"
            placeholder="Kirjoita tähän asia jonka haluat lisätä listalle"
          />
          <InputError
            class="mt-2"
            :message="errors"
          />
        </div>
        <PrimaryButton
          class="self-end"
          :disabled="isSubmitting"
          @click="addItem"
        >
          Lisää
        </PrimaryButton>
      </div>
      <div class="flex flex-col gap-4">
        <div
          v-for="(item, index) in list"
          :key="index"
          class="news-item border-b py-2 flex justify-between items-center"
        >
          <p class="news text-sm font-normal">
            {{ item }}
          </p>
          <XMark
            class="h-5 cursor-pointer"
            @click="removeItem(index)"
          />
        </div>
      </div>
    </div>
  </div>
</template>
