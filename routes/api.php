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
        Route::post('user/draft_thread', [UserThread::class, 'draft_thread']);
        Route::delete('user/buat_thread/hapus/{idd}', [UserThread::class, 'hapus_draft']);
        Route::post('user/edit_thread', [UserThread::class, 'edit_thread']);
        Route::delete('user/edit_thread/hapus/{idt}', [UserThread::class, 'hapus_thread']);

        Route::post('user/getthreadfilter', [UserThread::class, 'getthreadfilter']);
        Route::get('user/gettopuser', [UserThread::class, 'gettopuser']);
        Route::post('user/getpencarian', [UserThread::class, 'getpencarian']);
        Route::get('user/getdraftthread/{idd}', [UserThread::class, 'getdraftthread']);
        Route::get('user/getthread', [UserThread::class, 'getthread']);

        Route::get('user/getdraftthread', [UserThread::class, 'getdraftthread']);
        Route::get('user/getthread/{idt}', [UserThread::class, 'getthread']);
        Route::post('user/tanggapi', [UserThread::class, 'tanggapi']);
        Route::post('user/laporthread', [UserThread::class, 'laporthread']);
        Route::post('user/edit_tanggapan', [UserThread::class, 'edit_tanggapan']);
        Route::delete('user/edit_tanggapan/hapus/{idt}/{idtn}', [UserThread::class, 'hapus_tanggapan']);

        Route::get('user/gettanggapan/{idt}', [UserThread::class, 'gettanggapan']);
        Route::get('user/getisitanggapan/{idtn}', [UserThread::class, 'getisitanggapan']);
        Route::post('user/dukung/thread', [UserThread::class, 'dukungthread']);
        Route::post('user/dukung/tanggapan', [UserThread::class, 'dukungtanggapan']);
        Route::post('user/laportanggapan', [UserThread::class, 'laportanggapan']);


        Route::post('user/profil/edit', [Profil::class, 'edit']);
        Route::get('user/gettanggapanprofil', [Profil::class, 'gettanggapanprofil']);
        Route::get('user/gettanggapanprofil/{nim}', [Profil::class, 'gettanggapanprofil']);
        Route::get('user/getthreadprofil', [Profil::class, 'getthreadprofil']);
        Route::get('user/getthreadprofil/{nim}', [Profil::class, 'getthreadprofil']);
        Route::get('user/getprofil/{nim}', [Profil::class, 'getprofil']);
        Route::get('user/getdaftarpengguna', [Profil::class, 'getdaftarpengguna']);
        Route::get('user/getdaftarpengguna/{keyword}', [Profil::class, 'getdaftarpengguna']);


        Route::get('admin/getjumlah', [AdminThread::class, 'getjumlah']);

        Route::get('admin/getthread', [AdminThread::class, 'getthread']);
        Route::get('admin/getthread/{idt}', [AdminThread::class, 'getthread']);
        Route::delete('admin/hapus_thread/{idt}', [AdminThread::class, 'hapus_thread']);

        Route::get('admin/gettanggapan', [AdminThread::class, 'gettanggapan']);
        Route::get('admin/gettanggapan/{idtn}', [AdminThread::class, 'gettanggapan']);
        Route::delete('admin/hapus_tanggapan/{idt}/{idtn}', [AdminThread::class, 'hapus_tanggapan']);

        Route::get('admin/getlaporan_thread', [AdminThread::class, 'getlaporan_thread']);
        Route::get('admin/getlaporan_tanggapan', [AdminThread::class, 'getlaporan_tanggapan']);
        Route::delete('admin/hapus_laporanthread/{idt}', [AdminThread::class, 'hapus_laporanthread']);
        Route::delete('admin/hapus_laporantanggapan/{idt}/{idtn}/{idltn}', [AdminThread::class, 'hapus_laporantanggapan']);

        Route::get('admin/getakun', [AdminThread::class, 'getakun']);
        Route::get('admin/getcariakun', [AdminThread::class, 'getcariakun']);
        Route::get('admin/getcariakun/{keyword}', [AdminThread::class, 'getcariakun']);
        Route::get('admin/gantiakses/{nim}/{akses}', [AdminThread::class, 'gantiakses']);

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
