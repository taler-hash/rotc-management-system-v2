import { createWebHistory, createRouter } from 'vue-router'
import Register from '../views/Register.vue'
import Index from '../views/Index.vue'
import Dashboard from '../views/Dashboard.vue'
import Admin from '../views/Admin.vue'
import Login from '../views/Login.vue'

const routes = [  
  {
    path:'/',
    component: Index,
    redirect: (to) => {
      return { name: 'dashboard'}
    },
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: Dashboard
      },
      {
        path: 'admin',
        name: 'admin',
        component: Admin
      }
    ]
  },
  {
    path:'/register',
    component: Register
  },
  {
    path:'/login',
    component: Login
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
