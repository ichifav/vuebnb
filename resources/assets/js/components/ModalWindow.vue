<template>
    <div id='modal' :class='{ show : modalOpen }'>
        <button @click="_ => $emit('update:modalOpen', false)" class='modal-close'>&times;</button>
        <div class='modal-content'>
            <slot></slot>
        </div>
    </div>
</template>

<script>
 export default {
     props: {
         modalOpen: Boolean
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
                 this.$emit('update:modalOpen', false)
             }
         },
     },

     created() {
         document.addEventListener('keyup', this.escapeKeyListener)
     },

     destroyed() {
         document.removeEventListner('keyup', this.escapeKeyListener)
     }
 }
</script>

<style scoped></style>
