import {createApp} from 'vue'
import './app.css'
import App from './App.vue'
import router from "./router/index.js";
import store from "./store";

const app = createApp(App);

app.use(store)
    .use(router)
    .mount('#app');
