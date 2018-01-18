<template>
    <div class="image-carousel">
        <img :src="image" />
        <div class="controls">
            <carousel-control dir='left' @change-image='changeImage'></carousel-control>
            <carousel-control dir='right' @change-image='changeImage'></carousel-control>
        </div>
    </div>
</template>

<script>
 export default {
     components:{
         CarouselControl: require('./CarouselControl')
     },

     props: [
         'images',
     ],

     data() {
         return {
             index: 0,
         }
     },

     computed: {
         image() {
             return this.images[this.index]
         }
     },

     methods: {
         changeImage(val) {
             this.index += val

             if (this.index < 0) {
                 this.index = this.images.length - 1
             } else {
                 this.index = this.index % this.images.length
             }
         }
     }
 }
</script>

<style scoped>
 .image-carousel {
     height: 100%;
     margin-top: -12vh;
     position: relative;
     display: flex;
     align-items: center;
     justify-content: center;
 }

 .image-carousel img {
     width: 100%;
 }

 .image-carousel .controls {
     position: absolute;
     width: 100%;
     display: flex;
     justify-content: space-between;
 }
</style>
