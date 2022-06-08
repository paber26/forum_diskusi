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

    public function tanggapi(Request $request)
    {
        $idt = $request->idt;
        $q = DB::table('thread')->where('idt', $idt);
        $tmenanggapi = $q->first()->tmenanggapi;

        $q->update(['tmenanggapi' => $tmenanggapi + 1]);

        $stt = [
            'idtn' => uniqid(),
            'idt' => $idt,
            'nim' => Auth::user()->nim,
            'isi' => $request->isi,
        ];

        DB::table('tanggapan')->insert($stt);
        return 'Berhasil';
    }

    public function gettanggapan($idt)
    {

        $q = DB::table('tanggapan')->where('idt', $idt)->get();
        if ($q == null) {
            return 0;
        } else {
            return $q;
        }

        // $pertanyaan = DB::table('forum')->where('fid', $fid)->first();
        // $jawaban = DB::table('jawaban_forum')->select('jawaban_forum.*', 'dukungan_jawabanforum.pilihan')
        //     ->leftJoin('dukungan_jawabanforum', 'jawaban_forum.jfid', '=', 'dukungan_jawabanforum.jfid')
        //     ->orderByDesc('jawaban_forum.date')->where('fid', $fid)->get();
        // if ($jawaban == null) {
        //     $jawaban = 0;
        // }
        // return response()->json(array($pertanyaan, $jawaban));
    }
}
