<template>
    <div class="listing-summary-group">
        <h1>Places in {{ country }}</h1>

        <div class="listing-carousel">
            <div class="controls">
                <carousel-control-component @change-image="changeOffset" dir='left'>
                </carousel-control-component>

                <carousel-control-component @change-image="changeOffset" dir='right'>
                </carousel-control-component>
            </div>

            <div class="listing-summaries-wrapper">
                <div class="listing-summaries" :style="style">
                    <listing-summary-component v-for="listing in listings"
                                               :key="listing.id" :listing="listing">
                    </listing-summary-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
 const rowSize = 3
 const listingSummaryWidth = 365

 export default {
     components: {
         ListingSummaryComponent: require('./ListingSummary.vue'),
         CarouselControlComponent: require('./CarouselControl.vue'),
     },

     props: [
         'country',
         'listings',
     ],

     data() {
         return {
             offset: 0
         }
     },

     methods: {
         changeOffset(val) {
             let newVal = this.offset + parseInt(val)
             const max = this.listings.length - rowSize

             if (0 <= newVal && newVal <= max) {
                 this.offset = newVal
             } else if (max < newVal) {
                 this.offset = 0
             } else {
                 this.offset = max
             }
         }
     },

     computed: {
         style() {
             return { transform: `translateX(${this.offset * -listingSummaryWidth}px)` }
         }
     }
 }

</script>

<style scoped>
 .listing-summary-group {
     padding-bottom: 20px;
 }

 .listing-summaries-wrapper {
     overflow: hidden;
 }

 .listing-summaries {
     display: flex;
     flex-direction: row;
     justify-content: space-between;
     transition: transform 0.3s;
 }

 .listing-summaries > .listing-summary {
     margin-right: 15px;
 }

 .listing-summaries > .listing-summary:last-child {
     margin-right: 0;
 }

 .listing-carousel {
     position: relative;
 }

 .listing-carousel .controls {
     display: flex;
     justify-content: space-between;
     position: absolute;
     top: calc(50% - 45px);
     left: -45px;
     width: calc(100% + 90px);
 }

 .listing-carousel .controls .carousel-control {
     color: #c5c5c5;
     font-size: 1.5rem;
     cursor: pointer;
 }
</style>
