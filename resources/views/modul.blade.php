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
                    <div
                        class="col-span-12 sm:col-span-3 lg:col-span-2 p-2 -mt-4 mb-4 sm:mt-16 order-last sm:order-first">
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
                                <div class="font-semibold">Ruang Vektor</div>
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
                                <div class="font-semibold">Ortogonalisasi dan Proses Gram Schmidt</div>
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
                                <div class="font-semibold">Nilai Eigen dan Vektor Eigen</div>
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
                                <div class="font-semibold">Bentuk Bilinear dan Kuadrat</div>
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
                                <div class="font-semibold">Matriks Partisi</div>
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
                                <div class="font-semibold">Kronecker Product</div>
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
                                <div class="font-semibold">General Invers</div>
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
                                <div class="font-semibold">Conditional Invers</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-9 lg:col-span-10 m-2 p-2 rounded-2xl">
                        <div class="flex flex-row justify-between">
                            <div class="font-bold text-xl w-72">Ruang Vektor</div>
                            <div class="flex flex-row-reverse items-center w-72">
                                <div class="">Home/Materi/D-IV KS</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="bg-birumodul w-full h-0.5 rounded-3xl"></div>
                        <div class="bg-white mt-2 p-3 rounded-2xl">
                            <div><b>A. Dimensi, Ruang Baris dan Ruang Kolom</b><br>Dimensi adalah jumlah vektor
                                dalam suatu
                                baris untuk suatu ruang vektor berdimensi
                                terhingga. Ruang vektor nol mempunyai dimensi nol
                                Ruang baris matriks terbentuk dari baris-baris A yang kita sebut vektor-vektor baris A.
                                Yaitu vektor r_1=[a11, a12, ..., a1n] (dalam latex)<br><br>Ruang baris matriks terbentuk
                                dari kolom-kolom A yang kita sebut vektor-vektor kolom A.<br><br>Operasi baris elementer
                                tidak mengubah ruang baris sebuah matriks.<br><br>Jika A adalah sembarang matriks, ruang
                                baris
                                dan ruang kolom dari A mempunyai dimensi
                                yang sama <br><br>Vektor-vektor baris tak nol berbentuk eselon baris dari matriks A
                                membentuk
                                basis untuk
                                ruang baris A.
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-1 mt-2.5">
                            <div class="col-span-12 sm:col-span-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                                </svg>
                                <div class="font-bold text-blue-500">Kronecker Product</div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 flex justify-end items-center">
                                <div class="font-bold text-blue-500 text-right">Ortogonalisasi dan Proses Gram Schmidt
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
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
