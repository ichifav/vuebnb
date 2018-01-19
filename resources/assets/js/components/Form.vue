
<template>
    <div class="container">
        <form role="form" :method="method" :action="action">
            <input type="hidden" name="_token" :value="csrf_token">

            <div class="form-control">
                <input id="email" type="email" name="email"
                       placeholder="Email Address" required autofocus>
            </div>

            <div class="form-control">
                <input id="password" type="password" name="password"
                       placeholder="Password" required>
            </div>

            <div class="form-control">
                <button type="submit">{{ buttonLabel }}</button>
            </div>

            <p class="change-form">
                {{ message }}
                <router-link :to="{ name: link }">
                    {{ routeLabel }}
                </router-link>
            </p>
        </form>
    </div>
</template>

<script>
 export default {
     data() {
         return {
             csrf_token: window.csrf_token
         }
     },

     props: [
         'method',
         'action',
         'buttonLabel',
         'message',
         'routeLabel',
         'link',
     ]
 }
</script>

<style scoped>
 .container {
     margin: 0 auto;
     padding: 0 12px;
 }

 @media (min-width: 374px) {
     .container {
         width: 350px;
     }
 }

 input[type=text] {
     -webkit-appearance: none;
 }

 form {
     padding-top: 40px;
 }

 @media (min-width: 744px) {
     form {
         padding-top: 80px;
     }
 }

 .form-control {
     margin-bottom: 1em;
 }

 .change-form {
     text-align: center;
 }

 input[type=email],
 input[type=password],
 button,
 label {
     width: 100%;
     font-size: 19px !important;
     line-height: 24px;
     color: #484848;
     font-weight: 300;
     -webkit-appearance: none;
 }

 input {
     background-color: transparent;
     padding: 11px;
     border: 1px solid #dbdbdb;
     border-radius: 2px;
     box-sizing:border-box
 }

 button {
     background-color: #4fc08d;
     color: #ffffff;
     cursor: pointer;
     border: #4fc08d;
     border-radius: 4px;
     padding-top: 12px;
     padding-bottom: 12px;
 }
</style>
