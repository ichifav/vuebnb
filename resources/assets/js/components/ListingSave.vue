<template>
    <div class="listing-save" @click.stop="toggleSaved">
        <i :class="classes"></i>
    </div>
</template>

<script>
 export default {
     props: [
         'id',
     ],

     computed: {
         classes() {
             const saved = this.isSaved()

             return {
                 'fa': true,
                 'fa-lg': true,
                 'fa-heart': saved,
                 'fa-heart-o': !saved
             }
         }
     },

     methods: {
         isSaved() {
             return Boolean(this.$store.state.saved.find(saved => saved === this.id)
)         },

         toggleSaved() {
             this.$store.commit('toggleSaved', this.id)
         }
     }
 }
</script>

<style scoped>
 .listing-save {
     position: absolute;
     top: 20px;
     right: 20px;
     cursor: pointer;
 }

 .listing-save .fa-heart {
     color: #ff5a5f;
 }

 .listing-save .fa-heart-o {
     color: #ffffff;
 }
</style>
