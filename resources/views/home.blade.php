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
        <div class="flex flex-row min-h-screen">
            <div class="bg-blue-300 hidden sm:block">
                <div class="p-1 flex flex-col justify-center items-center h-46 w-32">
                    <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-20">
                    <div class="font-bold text-2xl">Modul</div>
                    <div class="font-bold text-lg -mt-2">Polstat STIS</div>
                </div>
                <div class="w-full border-solid border-2 border-gray-300"></div>
                <ul class="font-semibold">
                    <li class="bg-yellow-300 p-1.5 m-1.5 rounded-md">Beranda</li>
                    <li class="p-1.5 m-1.5">Modul</li>
                    <li class="p-1.5 m-1.5">Arsip Soal</li>
                    <li class="p-1.5 m-1.5">Forum Tanya Jawab</li>
                </ul>
            </div>
            <div class="flex flex-col w-full">
                <div class="bg-blue-200 p-2.5">
                    <div class="flex-row-reverse hidden sm:flex">
                        <div class="font-semibold ml-2">Bernaldo Napitupulu</div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="sm:hidden">
                        <img src="/img/polstat-stis.png" alt="Logo Polstat STIS" class="w-10">
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex justify-center">
                        <div class="bg-yellow-200 w-5/6 flex flex-col justify-center items-center mt-5 p-2 rounded-2xl">
                            <div class="font-semibold">Halo Bernaldo Napitupulu</div>
                            <div class="font-italic">Lupakan masa lalu dan teruslah bergerak maju</div>
                        </div>
                    </div>
                </div>
                <div class="bg-blue-200 p-2 font-semibold">Politeknik Statistika STIS</div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
