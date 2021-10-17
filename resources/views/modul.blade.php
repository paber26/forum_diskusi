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
        <div class="flex flex-col min-h-screen min-w-min">
            {{-- <div class="bg-blue-200 p-2">
                <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-16 h-16">
                <div>
                    <div class="text-2xl">Modul</div>
                    <div class="text-lg -mt-2">Polstat STIS</div>
                </div>
            </div> --}}
            <div class="flex flex-row items-center p-2 bg-blue-300 min-vw-100">
                <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-10 h-10 sm:w-12 sm:h-12">
                <div class="font-bold ml-2 text-white sm:hidden">
                    <div class="text-2xl sm:text-xl">Modul</div>
                    <div class="text-lg sm:text-base -mt-2">Polstat STIS</div>
                </div>
                <div class="font-bold ml-2 text-2xl text-white hidden sm:flex">
                    Modul Politeknik Statistika STIS
                </div>
            </div>
            <div class="flex-row bg-birumodul items-center hidden sm:flex">
                <div class="text-white font-semibold text-xl ml-3">D-IV KS</div>
                <div class="bg-white h-6 w-0.5 mx-2"></div>
                <div class="text-white font-semibold text-xl">Aljabar Linear</div>
            </div>
            <div class="flex flex-col bg-birumodul sm:hidden">
                <div class="text-white font-semibold text-xl ml-3 -mt-1">D-IV KS</div>
                <div class="text-white font-semibold text-xl ml-3 -mt-2">Aljabar Linear</div>
            </div>
            <div class="bg-red-300 flex-1">Isi</div>
            <div class="bg-blue-200 p-2 font-semibold">
                <div class="w-48">Politeknik Statistika STIS</div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
