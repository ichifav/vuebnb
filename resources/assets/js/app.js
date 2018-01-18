import Vue from 'vue'
import { populateAmenitiesAndPrices } from './helpers'

let model = JSON.parse(window.vuebnb_listing_model)
model = populateAmenitiesAndPrices(model)

const app = new Vue({
    el: '#app',

    components: {
        ImageCarouselComponent: require('./components/ImageCarousel'),
        ModalWindowComponent: require('./components/ModalWindow'),
    },

    data: Object.assign(model, {
        contracted: true,

        headerImageStyle: {
            'background-image': `url(${model.images[0]})`,
        }
    }),

    methods: {
        openModal() {
            this.$refs.imagemodal.openModal()
        }
    },
})
