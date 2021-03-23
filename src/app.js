import 'vite/dynamic-import-polyfill'
import './index.css'

import { createApp } from 'vue'
import App from './App.vue'
const vueApp = createApp(App)
vueApp.mount('#app')
