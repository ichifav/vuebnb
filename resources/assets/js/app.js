import Vue from 'vue'
import { populateAmenitiesAndPrices } from './helpers'

let model = JSON.parse(window.vuebnb_listing_model)
model = populateAmenitiesAndPrices(model)

const app = new Vue({
    el: '#app',

    data: Object.assign(model, {
        contracted: true,

        modalOpen: false,

        headerImageStyle: {
            'background-image': `url(${model.images[0]})`,
        }
    }),

    watch: {
        modalOpen() {
            let className = 'modal-open'

            if (this.modalOpen) {
                document.body.classList.add(className)
            } else {
                document.body.classList.remove(className)
            }
        }
    },

    methods: {
        escapeKeyListener(event) {
            if (event.keyCode === 27 && app.modalOpen) {
                app.modalOpen = false
            }
        },
    },

    created() {
        document.addEventListener('keyup', this.escapeKeyListener)
    },

    destroyed() {
        document.removeEventListner('keyup', this.escapeKeyListener)
    }
})
