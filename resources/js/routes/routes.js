import { createRouter, createWebHistory } from 'vue-router'

import App from '../vue/App.vue'
import Login from '../vue/login.vue'

const routes = [{
        path: '/todo',
        component: App
    },
    {
        path: '/api/loginform',
        component: Login
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router