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
            <div class="bg-gray-300 flex-1">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-4 p-2 mt-16">
                        <h1 class="font-bold text-xl text-blue-500">Materi</h1>
                        <div class="ml-2">
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>Ruang Vektor</div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>Ortogonalisasi dan Proses Gram Schmidt</div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>Nilai Eigen dan Vektor Eigen</div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>Bentuk Bilinear dan Kuadrat</div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>Matriks Partisi</div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>Kronecker Product</div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>General Invers</div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>Conditional Invers Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui
                                    suscipit velit optio atque id quod officiis consectetur harum quaerat veniam
                                    exercitationem quia totam deleniti consequatur, saepe alias sed cum expedita.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-8">Isi Materi</div>
                </div>
            </div>
            <div class="bg-blue-200 p-2 font-semibold">
                <div class="w-48">Politeknik Statistika STIS</div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
