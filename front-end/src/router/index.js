import { createRouter, createWebHistory } from 'vue-router';
import HomeVista from '../views/HomeVista.vue';
import LoginVista from '../views/LoginVista.vue';
import RegistroVista from '../views/RegistroVista.vue';

const routes = [
  {
    path: '/',
    component: LoginVista
  },
  {
    path: '/registrar',
    component: RegistroVista
  },
  {
    path: '/home',
    component: HomeVista
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
