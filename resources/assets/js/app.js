import Vue from 'vue'
import sample from './data'

const app = new Vue({
    el: '#app',

    data: {
        title: sample.title,
        address: sample.address,
        about: sample.about,

        amenities: sample.amenities,
        prices: sample.prices,

        contracted: true,
        modalOpen: false,

        headerImageStyle: {
            'background-image': 'url(/images/header.jpg)',
        },
    },

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
