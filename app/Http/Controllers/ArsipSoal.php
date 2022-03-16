<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipSoal extends Controller
{
    public function getdaftararsipsoal($mid)
    {
        $q = DB::table('daftararsipsoal')->where('mid', $mid)->orderBy('tahun')->get();
        if ($q == null) {
            return 0;
        } else {
            return $q;
        }
    }

    public function getarsipsoal($dasid)
    {
        $q = DB::table('arsipsoal')->where('dasid', $dasid)->get();
        if ($q == null) {
            return 0;
        } else {
            return $q;
        }
    }

    public function getdasid($mid)
    {
        $q = DB::table('daftararsipsoal')->where('mid', $mid)->orderBy('tahun')->get();
        if ($q == null) {
            return 0;
        } else {
            return $q->first()->dasid;
        }
    }

    public function getnamaarsipsoal($dasid)
    {
        return DB::table('daftararsipsoal')->where('dasid', $dasid)->first()->nama;
    }

    public function getdetailsoal($asid)
    {
        $q = DB::table('arsipsoal')->where('asid', $asid)->first();
        if ($q == null) {
            return 0;
        } else {
            return $q;
        }
    }

    public function tambahjawaban(Request $request)
    {
        $stt = [
            'jasid' => uniqid(),
            'asid' => $request->asid,
            'username' => 'Bernaldo',
            'jawaban' => $request->jawaban
        ];
        DB::table('jawaban')->insert($stt);
    }
}
