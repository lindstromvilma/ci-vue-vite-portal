<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
	url: {
		type: String,
		required: true,
	},
});

const content = ref('');

const fetchContent = async () => {
	try {
		const response = await fetch(props.url);
		content.value = await response.text();
	} catch (error) {
		console.error('Error fetching PHP view:', error);
	}
};

onMounted(() => {
	fetchContent();
});
</script>

<template>
  <div v-html="content"></div>
</template>