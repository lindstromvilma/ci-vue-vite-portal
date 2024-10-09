<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import ApexCharts from 'apexcharts'

const props = defineProps({
	message: {
		type: String,
		default: ''
	},
	payments: {
		type: Array,
		default: () => []
	}
})

const chartRef = ref(null)
let chart = null

console.log('Props Data:', props.data)

const options = {
	chart: {
		type: 'bar'
	},
	series: [
		{
			name: 'varaus',
			data: props.payments.map(item => item.varaus)
		},
		{
			name: 'käytetty',
			data: props.payments.map(item => item.käytetty)
		}
	],
	xaxis: {
		categories: props.payments.map(item => item['kausi-taso'])
	}
}

onMounted(() => {
	chart = new ApexCharts(chartRef.value, options)
	chart.render()
})

onUnmounted(() => {
	if (chart) {
		chart.destroy()
	}
})
</script>

<template>
  <div class="flex flex-col gap-10 w-full max-w-screen-2xl">
    <h1 class="text-2xl font-normal">
      {{ message }}
    </h1>

    <div
      id="chart"
      ref="chartRef"
      class="w-full"
    ></div>
  </div>
</template>