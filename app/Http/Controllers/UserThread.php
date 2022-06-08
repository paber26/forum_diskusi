<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserThread extends Controller
{
    public function buat_thread(Request $request)
    {
        $stt = [
            'idt' => uniqid(),
            'nim' => Auth::user()->nim,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];
        DB::table('thread')->insert($stt);

        return 'Berhasil';
    }

    public function getthread($idt = null)
    {
        if ($idt === null) {
            $q = DB::table('thread')->get();
            if ($q == null) {
                return 0;
            } else {
                return $q;
            }
        } else {
            return DB::table('thread')->where('idt', $idt)->first();
        }
    }
}
