import Vue from 'https://unpkg.com/vue'
import Router from 'https://unpkg.com/vue-router@3.1.3/dist/vue-router.js'
import HttpVueLoader from 'https://unpkg.com/http-vue-loader'
import Home from './components/pages/Home.vue'
import Login from './components/pages/Login.vue'
import store from './store.js'


Vue.use(Router)

//DEFINE ROUTE
const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HttpVueLoader(Home),
            meta: { requiresAuth: true }
        },
        {
            path: '/login',
            name: HttpVueLoader(Login),
            component: Login
        }
    ]
});

//Navigation Guards
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        let auth = store.getters.isAuth;
        if (!auth) {
            next({ name: 'login' })
        } else {
            next()
        }
    } else {
        next()
    }
});

export default router