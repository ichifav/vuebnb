import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import axios from 'axios'
import store from './store'

const router = new VueRouter({
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

router.beforeEach(async (to, from, next) => {
    const { data } = await axios.get(`/api${to.path}`)
    store.commit('addData', { route: to.name, data })
    next()
})

export default router
