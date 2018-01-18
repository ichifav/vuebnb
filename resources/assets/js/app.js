import 'core-js/fn/object/assign'
import Vue from 'vue'
import router from './router'

const app = new Vue({
    el: '#app',

    router,

    render: h => h(require('./components/App')),
})
