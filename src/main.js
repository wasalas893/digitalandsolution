import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import App from './App.vue';
import HomeComponent from './components/HomeComponent.vue';

const routes = [
  { path: '/', component: HomeComponent },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp(App);
app.config.productionTip = false;
app.use(router);
app.mount('#app');
