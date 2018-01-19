import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import router from './router'

import axios from 'axios'


export default new Vuex.Store({
    state: {
        saved: [],

        listing_summaries: [],

        listings: [],
    },

    getters: {
        getListing(state) {
            return id => state.listings.find(listing => id == listing.id)
        },
    },

    mutations: {
        assignSaved(state, saved) {
            state.saved = saved
        },

        toggleSaved(state, id) {
            if (window.auth) {
                const index = state.saved.findIndex(saved => saved === id)

                if (index === -1) {
                    state.saved.push(id)
                } else {
                    state.saved.splice(index, 1)
                }

            } else {
                router.push('/login')
            }
        },

        addData(state, { route, data }) {
            if (data.auth) {
                state.auth = data.auth
            }

            if (route === 'listing') {
                state.listings.push(data.listing)
            } else {
                state.listing_summaries = data.listings
            }
        },
    },

    actions: {
        async toggleSaved(store, listing_id) {
            const before = store.state.saved.length

            store.commit('toggleSaved', listing_id)

            const after = store.state.saved.length

            if (before < after) {
                axios.post(`/api/users/${window.user.id}/saved/${listing_id}`)
            } else if (before > after) {
                axios.delete(`/api/users/${window.user.id}/saved/${listing_id}`)
            }
        }
    }
})
