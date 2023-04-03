import { createApp } from "vue"
import App from "./App.vue"

const app = createApp({})
app.component('component', App)
app.mount('#app')

