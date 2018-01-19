import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        auth: false,

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
        toggleSaved(state, id) {
            if (state.auth) {
                const index = state.saved.findIndex(saved => saved === id)

                if (index === -1) {
                    state.saved.push(id)
                } else {
                    state.saved.splice(index, 1)
                }
            }
        },

        addData(state, { route, data }) {
            console.log(data)

            if (data.auth) {
                state.auth = data.auth
            }

            if (route === 'listing') {
                state.listings.push(data.listing)
            } else {
                state.listing_summaries = data.listings
            }
        },

        toggleAuth(state) {
            state.auth = !state.auth
        },
    }
})
