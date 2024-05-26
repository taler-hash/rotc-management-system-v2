import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router'
import PrimeVue from 'primevue/config';
import '../css/app.css'
import Lara from '@/presets/lara';
import VueCookies from 'vue-cookies';


import './axios/axios'

const app = createApp(App)

app
.use(VueCookies, {
  expires: '2d'
})
.use(router)
.use(PrimeVue, {
  unstyled: true,
  pt: Lara  
})
.mount('#app')