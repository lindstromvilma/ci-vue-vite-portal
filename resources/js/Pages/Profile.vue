<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue'
import ChevronRight from '@/Components/Icons/ChevronRight.vue'
const props = defineProps({
	title: {
		type: String,
		required: true,
	},
	user: {
		type: Object,
		default: () => {},
	},
})
</script>

<template>
  <div class="flex flex-col gap-10 w-full mx-auto">
    <div class="flex justify-between">
      <h1 class="text-2xl font-normal">
        {{ title }}
      </h1>
      <PrimaryButton class="self-end">
        Muuta tietoja
      </PrimaryButton>
    </div>
    <div class="w-full bg-primary-50 rounded px-6 py-4">
      <div class="flex flex-col gap-2 items-left">
        <div class="flex items-center justify-between border-b py-1">
          <span>Tunnus</span>
          <span>
            {{ user.id }}
          </span>
        </div>
        <div class="flex items-center justify-between border-b py-1">
          <span>Nimi</span>
          <span>
            {{ user.name }}
          </span>
        </div>
        <div class="flex items-center justify-between border-b py-1">
          <span>Sähköpostiosoite</span>
          <span>
            {{ user.email }}
          </span>
        </div>
        <div class="flex items-center justify-between py-1">
          <span>Puhelinnumero</span>
          <span>
            {{ user.phone }}
          </span>
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-2">
      <h2 class="text-xl font-normal">
        Oma osio
      </h2>
      <div class="flex flex-wrap gap-2">
        <a
          href="/lista"
          class="w-60 rounded bg-accent px-6 py-4 cursor-pointer hover:bg-accent-600"
        >
          <div class="flex justify-between items-center">
            Oma lista
            <ChevronRight class="h-4" />
          </div>
        </a>
        <a
          href="/ilmoitukset"
          class="w-60 rounded bg-info px-6 py-4 cursor-pointer hover:bg-info-600"
        >
          <div class="flex justify-between items-center">
            Ilmoitukset
            <ChevronRight class="h-4" />
          </div>
        </a>
      </div>
    </div>
  </div>
</template>