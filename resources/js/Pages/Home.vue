<script setup>
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
  </div>
</template>