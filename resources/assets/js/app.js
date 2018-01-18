import 'core-js/fn/object/assign'
import Vue from 'vue'
import router from './router'
import store from './store'

const app = new Vue({
    el: '#app',

    router,

    store,

    render: h => h(require('./components/App')),
})
