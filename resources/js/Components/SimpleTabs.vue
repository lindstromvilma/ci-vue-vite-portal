<script setup>
import { ref } from 'vue'

const props = defineProps({
	tabs: {
		type: Array,
		required: true,
	},
})

const activeTab = ref(props.tabs[0].value)

const activateTab = (value) => {
	activeTab.value = value
}
</script>

<template>
  <div class="flex flex-col">
    <div class="flex bg-gray-100 p-1 rounded w-max">
      <button
        v-for="tab in tabs"
        :key="tab.value"
        class="text-sm px-4 py-2 rounded focus:outline-none"
        :class="{ 'bg-white cursor-default': activeTab === tab.value }"
        @click="activateTab(tab.value)"
      >
        {{ tab.label }}
      </button>
    </div>

    <div class="mt-4">
      <div
        v-for="tab in tabs"
        v-show="activeTab === tab.value"
        :key="tab.value"
      >
        <slot :name="tab.value" />
      </div>
    </div>
  </div>
</template>
