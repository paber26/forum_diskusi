<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <div id="app">
        <div class="flex flex-row min-h-screen min-w-min">
            <sidebar-component></sidebar-component>
            <div class="flex flex-col w-full">
                <header-component></header-component>
                <div class="flex-1">
                    <router-view></router-view>
                </div>
                <footer-component></footer-component>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
