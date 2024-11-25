<script setup>
import { ref } from 'vue'
import Megaphone from '../Components/Icons/Megaphone.vue'

const props = defineProps({
	message: {
		type: String,
		required: true,
	},
	news: {
		type: Array,
		default: () => [],
	},
})

const ifTest = ref(false)
</script>

<template>
  <div class="flex flex-col gap-10 w-full max-w-screen-2xl">
    <h1 class="text-2xl font-normal">
      {{ message }}
    </h1>
    <div class="flex flex-col gap-4 w-full">
      <div class="flex gap-2 items-center">
        <Megaphone class="h-5" />
        <h2 class="text-xl font-normal">
          Ajankohtaista
        </h2>
      </div>
      <div>
        <div
          v-for="(item, index) in news"
          :key="index"
          class="news-item border-b py-2"
        >
          <p class="date text-sm text-gray-500">
            {{ item.date }}
          </p>
          <p class="news text-sm font-normal">
            {{ item.title }}
          </p>
        </div>
      </div>
    </div>
    <div
      v-show="ifTest"
      class="flex flex-col gap-2"
    >
      <div class="text-center text-white p-2 bg-primary hover:bg-primary-600 rounded transition ease-in-out duration-300 cursor-default">
        Pääväri
      </div>
      <div class="text-center p-2 bg-primary-50 hover:bg-primary-100 rounded transition ease-in-out duration-300 cursor-default">
        Vaalea pääväri
      </div>
      <div class="text-center p-2 bg-accent hover:bg-accent-600 rounded transition ease-in-out duration-300 cursor-default">
        Korostus
      </div>
      <div class="text-center p-2 bg-info hover:bg-info-600 rounded transition ease-in-out duration-300 cursor-default">
        Informaatio
      </div>
      <div class="text-center p-2 bg-success hover:bg-success-600 rounded transition ease-in-out duration-300 cursor-default">
        Onnistunut
      </div>
      <div class="text-center p-2 bg-danger hover:bg-danger-600 rounded transition ease-in-out duration-300 cursor-default">
        Virheilmoitus
      </div>
      <div class="text-center p-2 bg-warning hover:bg-warning-600 rounded transition ease-in-out duration-300 cursor-default">
        Huomio
      </div>
    </div>
  </div>
</template>