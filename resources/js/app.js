// app.js
import './bootstrap';

import { createApp } from 'vue'



// window.Vue = require('vue');
import * as VueRouter from 'vue-router'


// Vue.use(VueRouter)

import App from './vue/App.vue'
import Login from './vue/login.vue'

const routes = [{
        path: '/todo',
        component: App
    },
    {
        path: '/api/loginform',
        component: Login
    }
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/'),
    routes
})




// import createRouter from './routes/routes.js'


const app = new Vue({
    el: '#app',
    el: '#login',
    router,
    component: { App, Login }
})


createApp(Login).mount("#login")
createApp(App).mount("#app")