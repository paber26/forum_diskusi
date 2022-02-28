<?php

use App\Http\Controllers\ArsipSoal;
use App\Http\Controllers\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getdaftarmateri/d4-komputasi-statistik', [Materi::class, 'getdaftarmaterid4ks']);
Route::get('getimid/{mid}', [Materi::class, 'getimid']);


Route::get('getdaftararsipsoal/{mid}', [ArsipSoal::class, 'getdaftararsipsoal']);
Route::get('getarsipsoal/{dasid}', [ArsipSoal::class, 'getarsipsoal']);

Route::get('getdasid/{mid}', [ArsipSoal::class, 'getdasid']);
Route::get('getnamaarsipsoal/{dasid}', [ArsipSoal::class, 'getnamaarsipsoal']);
