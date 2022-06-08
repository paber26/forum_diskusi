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
}
