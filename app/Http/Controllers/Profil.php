<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Profil extends Controller
{
    public function edit(Request $request)
    {
        $deskripsi = $request->deskripsi;
        $nowa = $request->nowa;
        $alamat = $request->alamat;
        $password = $request->password;

        if ($deskripsi == null) {
            $deskripsi = '-';
        }
        if ($nowa == null) {
            $nowa = '-';
        }
        if ($alamat == null) {
            $alamat = '-';
        }

        if ($password == null) {
            $stt = [
                'deskripsi' => $deskripsi,
                'nowa' => $nowa,
                'alamat' => $alamat,
            ];
        } else {
            $stt = [
                'deskripsi' => $deskripsi,
                'nowa' => $nowa,
                'alamat' => $alamat,
                'password' => Hash::make($password),
            ];
        }

        DB::table('users')->where('nim', Auth::user()->nim)->update($stt);

        return response()->json(array('Berhasil', url('/user/profil')));
    }

    public function gettanggapanprofil()
    {
        $q = DB::table('tanggapan')->join('thread', 'tanggapan.idt', '=', 'thread.idt')
            ->select('thread.judul', 'tanggapan.*')->get();

        return response()->json(array($q->count(), $q));
    }

    public function getthreadprofil()
    {
        $q = DB::table('thread')->where('nim', Auth::user()->nim)->get();
        if ($q == null) {
            return 0;
        } else {
            return response()->json(array($q->count(), $q));
        }
    }
}
