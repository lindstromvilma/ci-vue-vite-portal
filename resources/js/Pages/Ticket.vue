<script setup>
import { ref, computed } from 'vue'
import InputLabel from '@/components/InputLabel.vue'
import TextInput from '@/components/TextInput.vue'
import BaseSelect from '@/components/BaseSelect.vue'
import Popover from '@/Components/Popover.vue'
import InputError from '@/components/InputError.vue'
import DatePicker from '@/components/DatePicker.vue'
import PrimaryButton from '@/components/PrimaryButton.vue'

const props = defineProps({
	message: {
		type: String,
		required: true,
	},
	popovers: {
		type: Array,
		default: () => []
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

const getPopoverContent = (id) => {
	const popover = props.popovers.find(p => p.id === id)
	return popover ? popover.content : ''
}
</script>

<template>
  <div class="flex flex-col gap-10 text-black w-full max-w-screen-2xl">
    <h1 class="text-2xl font-normal">
      {{ message }}
    </h1>
    <form class="flex flex-col self-center gap-4 w-full">
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
        <div class="flex gap-4">
          <BaseSelect
            id="duration"
            v-model="form.duration"
            :options="durationOptions"
            :default-value="'Valitse voimassaoloaika'"
          />
          <Popover
            v-if="getPopoverContent('duration')"
            :content="getPopoverContent('duration')"
          />
        </div>
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