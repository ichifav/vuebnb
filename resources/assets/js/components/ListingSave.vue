<template>
    <div class="listing-save" @click.stop="toggleSaved">
        <button v-if="button">
            <i :class="classes"></i>
            {{ message }}
        </button>
        <i v-else :class="classes"></i>
    </div>
</template>

<script>
 export default {
     props: [
         'id',
         'button',
     ],

     computed: {
         classes() {
             const saved = this.isSaved

             return {
                 'fa': true,
                 'fa-lg': true,
                 'fa-heart': saved,
                 'fa-heart-o': !saved
             }
         },

         isSaved() {
             return Boolean(this.$store.state.saved.find(saved => saved === this.id))
         },

         message() {
             return this.isSaved ? 'Saved' : 'Save'
         }
     },

     methods: {
         toggleSaved() {
             this.$store.dispatch('toggleSaved', this.id)
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

    .listing-save i {
    padding-right: 4px;
    }

    .listing-save button .fa-heart-o {
    color: #808080;
    }

    .listing-save i {
    padding-right: 4px;
    }

    .listing-save button .fa-heart-o {
    color: #808080;
    }
</style>
