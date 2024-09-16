import { createApp, defineAsyncComponent } from 'vue';
import App from './App.vue';
import '../css/app.css';

const app = createApp(App);

const page = document.getElementById('app').dataset.page;
const props = JSON.parse(document.getElementById('app').dataset.props);

const DynamicComponent = defineAsyncComponent(() => import(`./Pages/${page}.vue`));

app.component('dynamic-page', DynamicComponent);

app.provide('pageProps', props);

app.mount('#app');