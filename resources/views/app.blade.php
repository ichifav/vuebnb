<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Vuebnb</title>
        <link rel='stylesheet' href='node_modules/open-sans-all/css/open-sans.css'>
        <link rel='stylesheet' href='node_modules/font-awesome/css/font-awesome.css'>
        <link rel='stylesheet' href='{{ asset('css/style.css') }}' type='text/css'>
        <link rel='stylesheet' href='{{ asset('css/vue-style.css') }}' type='text/css'>
    </head>
    <body>
        <div id="toolbar">
            <img class="icon" src="{{ asset('images/logo.png') }}">
            <h1>vuebnb</h1>
        </div>

        <div id="app">
            <header-image-component :image-url="images[0]" @header-clicked="openModal">
            </header-image-component>

            <div class="container">
                <div class="heading">
                    <h1>@{{ title }}</h1>
                    <p>@{{ address }}</p>
                </div>

                <hr>

                <div class="about">
                    <h3>About this listing</h3>
                    <expendable-text-component>@{{ about }}</expendable-text-component>
                </div>

                <div class="lists">
                    <feature-list-component title="Amenities" :items="amenities">
                        <template slot-scope="amenity">
                            <i class="fa fa-lg" :class="amenity.icon"></i>
                            <span>@{{ amenity.title }}</span>
                        </template>
                    </feature-list-component>

                    <feature-list-component title="Prices" :items="prices">
                        <template slot-scope="price">
                            @{{ price.title }}: <strong>@{{ price.value }}</strong>
                        </template>
                    </feature-list-component>
                </div>
            </div>

            <modal-window-component ref="imagemodal">
                <image-carousel-component :images='images'></image-carousel-component>
            </modal-window-component>
        </div>

        <script type="text/javascript">
         window.vuebnb_listing_model = '{!! addslashes(json_encode($model)) !!}'
        </script>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
