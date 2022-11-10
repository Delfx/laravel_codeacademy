import './bootstrap';
import '../../sass/app.scss'
import { createApp } from 'vue'
import Alpine from 'alpinejs';


import App from './App.vue'
import Router from './router'

const app = createApp(App)

app.use(Router)
app.mount('#shop')

window.Alpine = Alpine;

Alpine.start();
