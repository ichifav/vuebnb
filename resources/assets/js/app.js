import Vue from 'vue'
import { populateAmenitiesAndPrices } from './helpers'

let model = JSON.parse(window.vuebnb_listing_model)
model = populateAmenitiesAndPrices(model)

const app = new Vue({
    el: '#app',

    components: {
        HeaderImageComponent: require('./components/HeaderImage'),
        ExpendableTextComponent: require('./components/ExpandableText'),
        FeatureListComponent: require('./components/FeatureList'),
        ImageCarouselComponent: require('./components/ImageCarousel'),
        ModalWindowComponent: require('./components/ModalWindow'),
    },

    data: Object.assign(model, {

    }),

    methods: {
        openModal() {
            this.$refs.imagemodal.openModal()
        }
    },
})
