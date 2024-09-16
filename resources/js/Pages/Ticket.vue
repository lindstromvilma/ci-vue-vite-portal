<script setup>
import { ref, computed } from 'vue'
import InputLabel from '@/components/InputLabel.vue'
import TextInput from '@/components/TextInput.vue'
import BaseSelect from '@/components/BaseSelect.vue'
import InputError from '@/components/InputError.vue'
import DatePicker from '@/components/DatePicker.vue'
import PrimaryButton from '@/components/PrimaryButton.vue'

const props = defineProps({
	message: {
		type: String,
		required: true,
	},
})

const form = ref({
	applicant: '',
	approver: '',
	duration: '',
	startDate: '',
	endDate: '',
	errors: {
		applicant: '',
		approver: '',
		duration: '',
		startDate: '',
		endDate: '',
	},
})

const durationOptions = [
	'Toistaiseksi',
	'Määräajaksi'
]

const showDatePicker = computed(() => form.value.duration === 'Määräajaksi')
</script>

<template>
  <div class="flex flex-col gap-10 text-black w-full max-w-screen-xl">
    <h1 class="text-2xl font-normal">
      {{ props.message }}
    </h1>
    <form class="flex flex-col self-center gap-4 w-full max-w-screen-lg">
      <div class="w-full">
        <InputLabel
          for="applicant"
          value="Hakija"
        />
        <TextInput
          id="applicant"
          v-model="form.applicant"
          placeholder="Kirjoita hakijan nimi"
        />
        <InputError
          class="mt-2"
          :message="form.errors.applicant"
        />
      </div>
      <div class="w-full">
        <InputLabel
          for="approver"
          value="Hyväksyjä"
        />
        <TextInput
          id="approver"
          v-model="form.approver"
          placeholder="Kirjoita hyväksyjän nimi"
        />
        <InputError
          class="mt-2"
          :message="form.errors.approver"
        />
      </div>
      <div class="w-full">
        <InputLabel
          for="duration"
          value="Voimassaoloaika"
        />
        <BaseSelect
          id="duration"
          v-model="form.duration"
          :options="durationOptions"
          :default-value="'Valitse voimassaoloaika'"
        />
        <InputError
          class="mt-2"
          :message="form.errors.duration"
        />
      </div>
      <div
        v-if="showDatePicker"
        class="flex flex-col gap-4 w-full"
      >
        <div>
          <InputLabel
            for="startDate"
            value="Aloituspäivä"
          />
          <DatePicker
            id="startDate"
            v-model="form.startDate"
            placeholder="Valitse aloituspäivä"
          />
          <InputError
            class="mt-2"
            :message="form.errors.startDate"
          />
        </div>
        <div>
          <InputLabel
            for="endDate"
            value="Päättymispäivä"
          />
          <DatePicker
            id="endDate"
            v-model="form.endDate"
            placeholder="Valitse päättymispäivä"
          />
          <InputError
            class="mt-2"
            :message="form.errors.endDate"
          />
        </div>
      </div>
      <PrimaryButton class="mt-4 self-end">
        Lähetä
      </PrimaryButton>
    </form>
  </div>
</template>