<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <title>SIRADIG - Politeknik Statistika STIS</title>
</head>

<body>
    <div id="app">
        <div class="flex flex-row min-h-screen min-w-min">
            <sidebaradmin-component></sidebaradmin-component>
            <div class="flex flex-col w-full">
                <header-component :user="{{ Auth::user() }}"></header-component>
                <div class="flex-1 bg-gray-200">
                    <router-view :user="{{ Auth::user() }}"></router-view>
                </div>
                <footer-component></footer-component>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
