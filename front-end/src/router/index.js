import { createRouter, createWebHistory } from 'vue-router';
import HomeVista from '../views/HomeVista.vue';
import LoginVista from '../views/LoginVista.vue';
import Index from '../views/Index.vue';

const routes = [
  {
    path: '/',
    component: Index
  },
  {
    path: '/login',
    component: LoginVista
  },
  {
    path: '/home',
    component: HomeVista
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
