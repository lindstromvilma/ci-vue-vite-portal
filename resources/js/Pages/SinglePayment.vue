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

const varaus = props.payments.reduce((sum, item) => sum + item.varaus, 0)

const options = {
	chart: {
		type: 'bar'
	},
	series: [
		{
			name: 'Käytetty',
			data: props.payments.map(item => item.käytetty)
		}
	],
	xaxis: {
		categories: props.payments.map(item => item['kausi-taso'])
	},
	yaxis: {
		min: 0,
		max: varaus,
	},
	annotations: {
		yaxis: [
			{
				y: varaus,
				borderColor: '#22c55e',
				label: {
					borderColor: '#22c55e',
					borderRadius: 0,
					style: {
						color: '#fff',
						background: '#22c55e',
					},
					text: `Varaus: ${varaus}`
				}
			}
		]
	},
	colors: ['#60a5fa'] // Set the color of the bars
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