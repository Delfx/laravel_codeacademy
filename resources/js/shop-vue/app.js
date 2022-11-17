import './bootstrap';
import '../../sass/app.scss'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import Alpine from 'alpinejs';


import App from './App.vue'
import Router from './router'


const app = createApp(App)
const pinia = createPinia()

app.use(Router)
app.use(pinia)
app.mount('#shop')

window.Alpine = Alpine;

Alpine.start();
