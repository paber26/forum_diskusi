<?php

use App\Http\Controllers\Authen;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', function () {
    return view('auth');
})->name('register');

Route::get('/login', function () {
    return view('auth');
})->name('login');

Route::post('/register', [Authen::class, 'register']);
Route::post('/login', [Authen::class, 'login']);

Route::get('/admin/login', function () {
    return view('auth');
})->name('adminlogin');

Route::post('/admin/login', [Authen::class, 'adminlogin']);

Route::group(
    ['middleware' => 'admin'],
    function () {
        Route::get('/admin', function () {
            return view('home');
        })->where('any', '.*');
        Route::get('/admin/{any}', function () {
            return view('home');
        })->where('any', '.*');
    }
);

// Route::group(
//     ['middleware' => 'auth'],
//     function () {
//         Route::get('/{any}', function () {
//             return view('home');
//         })->where('any', '.*');

//         Route::get('/materi/{any}', function () {
//             return view('materi');
//         })->where('any', '.*');

//         Route::get('/arsipsoal/{any}', function () {
//             return view('arsipsoal');
//         })->where('any', '.*');

//         Route::post('/logout', [Authen::class, 'logout']);
//     }
// );
