import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 }
    },

    routes: [
        {
            path: '/',
            component: require('./components/HomePage'),
            name: 'home',
        },

        {
            path: '/listings/:listing',
            component: require('./components/ListingPage'),
            name: 'listing',
        },
    ],
})
