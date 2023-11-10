import './bootstrap';
import IndexComponent from './views/main/IndexView.vue';
import router from './router';
import {createApp} from 'vue';
import { Roulette } from 'vue3-roulette'

createApp(IndexComponent).component("roulette", Roulette).use(router).mount('#app');