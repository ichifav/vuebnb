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

        {
            path: '/saved',
            component: require('./components/SavedPage'),
            name: 'saved',
        },

        {
            path: '/login',
            component: require('./components/Form'),
            name: 'login',
            props: {
                method: 'POST',
                action: '/login',
                buttonLabel: 'Log in',
                message: "Don't have an account?",
                routeLabel: 'Sign up',
                link: 'register'
            },
        },

        {
            path: '/register',
            component: require('./components/Form'),
            name: 'register',
            props: {
                method: 'POST',
                action: '/users',
                buttonLabel: 'Sign up',
                message: "Already have a Vuebnb account?",
                routeLabel: 'Log in',
                link: 'login'
            },
        },
    ],
})

router.beforeEach(async (to, from, next) => {
    if (window.auth) {
        const { data } = await axios.get(`/api/users/${window.user.id}/saved`)
        store.commit('assignSaved', data)
    }

    if (to.name !== 'login' && to.name !== 'register') {
        const isStored = to.name === 'listing'
              ? Boolean(store.getters.getListing(to.params.listing))
              : store.state.listing_summaries.length > 0

        if (!isStored) {
            const { data } = await axios.get(`/api${to.path}`)
            store.commit('addData', { route: to.name, data })
        }
    }

    next()
})

export default router
