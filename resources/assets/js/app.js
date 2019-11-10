import Vue from 'https://unpkg.com/vue'
import router from './router.js'
import store from './store.js'
import App from './components/App.Vue'

new Vue({
    el: '#dw',
    router,
    store,
    components: {
        App
    }
});