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
	colors: ['#e5c4f5'],
	series: [
		{
			name: 'Käytetty',
			data: props.payments.map(item => item.käytetty),
		}
	],
	xaxis: {
		categories: props.payments.map(item => item['kausi-taso'])
	},
	yaxis: {
		min: 0,
		max: varaus,
		labels: {
			formatter: function (value) {
				return Math.round(value);
			}
		}
	},
	annotations: {
		yaxis: [
			{
				y: varaus,
				borderColor: '#aee5c9',
				strokeDashArray: 0,
				borderWidth: 2,
				label: {
					borderColor: '#aee5c9',
					borderRadius: 0,
					position: 'center',
					style: {
						color: '#19171B',
						fontSize: '12px',
						fontWeight: 'bold',
						background: '#aee5c9',
						padding: {
							left: 10,
							right: 10,
							top: 5,
							bottom: 5
						}
					},
					text: `Varaus: ${varaus}`
				}
			}
		],
	},
	dataLabels: {
		enabled: true,
		style: {
			colors: ['#343a40'],
			fontSize: '12px',
			fontWeight: 'bold',
		}
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