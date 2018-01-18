<template>
    <div>
        <header-image-component v-if="listing.images[0]"
                                :id="listing.id"
                                :image-url="listing.images[0]"
                                @header-clicked="openModal">
        </header-image-component>

        <div class="container">
            <div class="heading">
                <h1>{{ listing.title }}</h1>
                <p>{{ listing.address }}</p>
            </div>

            <hr>

            <div class="about">
                <h3>About this listing</h3>
                <expendable-text-component>{{ listing.about }}</expendable-text-component>
            </div>

            <div class="lists">
                <feature-list-component title="Amenities" :items="listing.amenities">
                    <template slot-scope="amenity">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>{{ amenity.title }}</span>
                    </template>
                </feature-list-component>

                <feature-list-component title="Prices" :items="listing.prices">
                    <template slot-scope="price">
                        {{ price.title }}: <strong>{{ price.value }}</strong>
                    </template>
                </feature-list-component>
            </div>
        </div>

        <modal-window-component ref="imagemodal">
            <image-carousel-component :images='listing.images'></image-carousel-component>
        </modal-window-component>
    </div>
</template>

<script>
 import { populateAmenitiesAndPrices } from '../helpers.js'

 export default {
     components: {
         HeaderImageComponent: require('./HeaderImage'),
         ExpendableTextComponent: require('./ExpandableText'),
         FeatureListComponent: require('./FeatureList'),
         ImageCarouselComponent: require('./ImageCarousel'),
         ModalWindowComponent: require('./ModalWindow'),
     },

     computed: {
         listing() {
             const listing = this.$store.state.listings.find(
                 listing => listing.id == this.$route.params.listing
             )

             return populateAmenitiesAndPrices(listing)
         }
     },

     methods: {
         openModal() {
             this.$refs.imagemodal.openModal()
         }
     },
 }
</script>

<style scoped>
 .container {
     margin: 0 auto;
     padding: 0 12px;
 }

 @media (min-width: 744px) {
     .container {
         width: 696px;
     }
 }

 .heading {
     margin-bottom: 2em;
 }

 .heading h1 {
     font-size: 32px;
     font-weight: 700;
 }

 .heading p {
     font-size: 15px;
     color: #767676;
 }

 .about {
     margin: 2em 0;
 }

 .about h3 {
     font-size: 22px;
 }
</style>
