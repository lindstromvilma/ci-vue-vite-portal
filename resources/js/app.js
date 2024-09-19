import { createApp, defineAsyncComponent } from 'vue'
import App from './App.vue'
import '../css/app.css'

const app = createApp(App) // create Vue app instance

const appElement = document.getElementById('app')
const { page, props } = appElement.dataset

const parsedProps = JSON.parse(props || '{}') // parse the props from the dataset
appElement.removeAttribute('data-props')

// define the async component
const DynamicComponent = defineAsyncComponent(() =>
	import(`./Pages/${page}.vue`)
)

app.component('DynamicPage', DynamicComponent) // register the component

app.provide('pageProps', parsedProps) // provide the props to the component
app.mount('#app') // mount the app to the DOM