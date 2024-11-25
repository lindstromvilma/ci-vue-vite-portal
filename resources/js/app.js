import { createApp, defineAsyncComponent } from 'vue'
import App from './App.vue'
import '../css/app.css'

const app = createApp(App) // create Vue app instance

const appElement = document.getElementById('app')
if (appElement) {
	const { page, props } = appElement.dataset

	// parse the props JSON string
	const parsedProps = props ? JSON.parse(props) : {}

	appElement.removeAttribute('data-props')

	// dynamic import of the page components
	import(`./Pages/${page}.vue`)
		.then(module => {
			const DynamicPage = module.default
			app.component('DynamicPage', DynamicPage) // register the component
			app.provide('pageProps', parsedProps) // Provide the props to the component
			app.mount('#app') // Mount the app to the DOM
		})
		.catch(error => {
			console.error('Error loading component:', error)
		})
}