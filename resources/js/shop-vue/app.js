import './bootstrap';
import '../../sass/app.scss'
import { createApp } from 'vue'
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import Alpine from 'alpinejs';

import App from './App.vue'
const app = createApp(App)
app.mount('#shop')

window.Alpine = Alpine;

Alpine.start();
