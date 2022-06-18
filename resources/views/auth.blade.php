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
        <div class="min-h-screen bg-gray-300 flex justify-center items-center py-8">
            <div class="flex flex-col items-center w-4/5 sm:w-1/2 lg:w-1/4">
                <div class="flex justify-center mb-2">
                    <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-32 sm:w-40">
                </div>
                <router-view></router-view>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
