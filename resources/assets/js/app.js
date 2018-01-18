import 'core-js/fn/object/assign'
import Vue from 'vue'

const app = new Vue({
    el: '#app',

    render: h => h(require('./components/ListingPage')),
})
