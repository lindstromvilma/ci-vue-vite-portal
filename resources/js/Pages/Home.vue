<script setup>
import { ref } from 'vue'
import Megaphone from '../Components/Icons/Megaphone.vue'

const props = defineProps({
	message: {
		type: String,
		required: true,
	},
})

// sample news data
const newsItems = ref([
	{ date: '11.09.2024', news: 'Uusi Luukku avattu' },
	{ date: '04.06.2024', news: 'Testi tiedote' },
	{ date: '18.03.2024', news: 'Henkilöhaut toimivat' },
	{ date: '20.02.2024', news: 'Tietokanta päivitetty' },
])
</script>

<template>
  <div class="flex flex-col gap-10 text-black w-full max-w-screen-xl">
    <h1 class="text-2xl font-normal">
      {{ props.message }}
    </h1>

    <div class="flex flex-col gap-4 w-full">
      <div class="flex gap-2 items-center">
        <Megaphone class="h-5" />
        <h2 class="text-xl font-medium">
          Ajankohtaista
        </h2>
      </div>
      <div>
        <div
          v-for="(item, index) in newsItems"
          :key="index"
          class="news-item border-b py-2"
        >
          <p class="date text-sm text-gray-500">
            {{ item.date }}
          </p>
          <p class="news text-sm font-normal">
            {{ item.news }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>