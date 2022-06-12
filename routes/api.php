<?php

use App\Http\Controllers\AdminThread;
use App\Http\Controllers\ArsipSoal;
use App\Http\Controllers\Forum;
use App\Http\Controllers\Materi;
use App\Http\Controllers\Profil;
use App\Http\Controllers\UserThread;
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

Route::group(
    ['middleware' => 'auth:api'],
    function () {
        Route::post('user/buat_thread', [UserThread::class, 'buat_thread']);
        Route::delete('user/buat_thread/hapus/{idd}', [UserThread::class, 'hapus']);

        Route::get('user/getdraftthread', [UserThread::class, 'getdraftthread']);
        Route::get('user/getdraftthread/{idd}', [UserThread::class, 'getdraftthread']);
        Route::get('user/getthread', [UserThread::class, 'getthread']);
        Route::get('user/getthread/{idt}', [UserThread::class, 'getthread']);
        Route::post('user/tanggapi', [UserThread::class, 'tanggapi']);
        Route::post('user/laporthread', [UserThread::class, 'laporthread']);
        Route::get('user/gettanggapan/{idt}', [UserThread::class, 'gettanggapan']);
        Route::post('user/dukung/thread', [UserThread::class, 'dukungthread']);
        Route::post('user/dukung/tanggapan', [UserThread::class, 'dukungtanggapan']);


        Route::post('user/profil/edit', [Profil::class, 'edit']);
        Route::get('user/gettanggapanprofil', [Profil::class, 'gettanggapanprofil']);
        Route::get('user/getthreadprofil', [Profil::class, 'getthreadprofil']);


        Route::get('admin/getthread', [AdminThread::class, 'getthread']);
        Route::get('admin/getthread/{idt}', [AdminThread::class, 'getthread']);
        Route::get('admin/gettanggapan', [AdminThread::class, 'gettanggapan']);
        Route::get('admin/gettanggapan/{idtn}', [AdminThread::class, 'gettanggapan']);





        Route::get('getdaftarmatkul/{prodi}', [Materi::class, 'getdaftarmatkul']);

        Route::get('getdaftarmateri/d4-komputasi-statistik', [Materi::class, 'getdaftarmaterid4ks']);
        Route::get('getimid/{imid}', [Materi::class, 'getimid']);
        Route::get('getnamamatkul/{mid}', [Materi::class, 'getnamamatkul']);
        Route::get('getdaftarmateri/{mid}', [Materi::class, 'getdaftarmateri']);
        Route::get('getmateri/{imid}', [Materi::class, 'getmateri']);


        Route::get('getdaftararsipsoal/{mid}', [ArsipSoal::class, 'getdaftararsipsoal']);
        Route::get('getarsipsoal/{dasid}', [ArsipSoal::class, 'getarsipsoal']);
        Route::get('getdetailsoal/{asid}', [ArsipSoal::class, 'getdetailsoal']);

        Route::post('tambahjawaban', [ArsipSoal::class, 'tambahjawaban']);
        Route::post('dukungan', [ArsipSoal::class, 'dukungan']);

        Route::get('getdasid/{mid}', [ArsipSoal::class, 'getdasid']);
        Route::get('getnamaarsipsoal/{dasid}', [ArsipSoal::class, 'getnamaarsipsoal']);

        Route::post('tambahpertanyaan', [Forum::class, 'tambahpertanyaan']);
        Route::get('getdaftarforum/{peminatan}', [Forum::class, 'getdaftarforum']);
        Route::post('dukunganforum', [Forum::class, 'dukunganforum']);
        Route::get('getdetailsoalforum/{fid}', [Forum::class, 'getdetailsoalforum']);
        Route::post('tambahjawabanforum', [Forum::class, 'tambahjawabanforum']);
        Route::post('dukunganjawabanforum', [Forum::class, 'dukunganjawabanforum']);
    }
);
