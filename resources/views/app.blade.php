<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Vuebnb</title>
        <link rel='stylesheet' href='{{ asset('css/style.css') }}' type='text/css'>
        <link rel='stylesheet' href='{{ asset('css/vue-style.css') }}' type='text/css'>
    </head>
    <body>
        <div id="app"></div>

        @php
            if (auth()->check()) {
                $user = auth()->user()->toJson();
            } else {
                $user = "{}";
            }
        @endphp

        <script type='text/javascript''>
         window.csrf_token = '{{ csrf_token() }}'
         window.user = {!! $user !!}
         window.auth = Boolean(window.user.id)
        </script>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
