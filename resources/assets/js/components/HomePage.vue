<template>
    <div class="container">
        <listing-summary-group-component v-for="(group, country) in listing_groups"
             :key="country"
             :listings="group"
             :country="country">
        </listing-summary-group-component>
    </div>
</template>

<script>
 import { groupByCountry } from '../helpers'

 export default {
     components: {
         ListingSummaryGroupComponent: require('./ListingSummaryGroup')
     },

     computed: {
         listing_groups() {
             return groupByCountry(this.$store.state.listing_summaries)
         }
     },
 }
</script>

<style scoped>
 .container {
     margin: 0 auto;
     padding: 0 25px;
 }

 @media (min-width: 1131px) {
     .container {
         width: 1080px;
     }
 }

 .listing-summary-group {
     padding-bottom: 20px;
 }

 .listing-summaries {
     display: flex;
     flex-direction: row;
     justify-content: space-between;
     overflow: hidden;
 }
 .listing-summaries > .listing-summary {
     margin-right: 15px;
 }

 .listing-summaries > .listing-summary:last-child {
     margin-right: 0;
 }
</style>
