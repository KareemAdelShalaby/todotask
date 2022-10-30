<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To Do List</title>

        <!-- Fonts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite('resources/css/app.css')
    </head>
    <body>
        {{-- <h2>Test</h2> --}}

        <div  id="app">
            {{-- <App :items="items"/> --}}

        </div>

	    @vite('resources/js/app.js')

        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    </body>
</html>
