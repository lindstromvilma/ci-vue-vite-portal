import { createApp, defineAsyncComponent } from 'vue'
import App from './App.vue'
import '../css/app.css'

const app = createApp(App) // create Vue app instance

const appElement = document.getElementById('app')
const { page, props } = appElement.dataset

const parsedProps = JSON.parse(props) // parse the props from the dataset
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
		console.error('Error loading componen:', error)
	})