<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminThread extends Controller
{
    public function getthread($idt = null)
    {
        if ($idt == null) {
            // $q = DB::table('thread')->orderBy('date', 'desc')->get();
            $q = DB::table('thread')
                ->select('thread.*', 'users.nama')
                ->leftJoin('users', 'thread.nim', '=', 'users.nim')
                ->orderBy('date', 'desc')->get();
            if ($q == null) {
                return 0;
            } else {
                return $q;
            }
        } else {
            return DB::table('thread')->where('idt', $idt)->first();
        }
    }

    public function gettanggapan($idt = null)
    {
        if ($idt == null) {
            return DB::table('tanggapan AS tn')
                ->select('tn.idtn', 'tn.date', 'tn.nim AS nimtn', 'tn.isi', 't.idt', 't.nim AS nimt', 't.judul')
                ->orderBy('tn.date', 'desc')
                ->leftJoin('thread AS t', 'tn.idt', '=', 't.idt')->get();
        } else {
            return DB::table('tanggapan')->where('idt', $idt)->get();
        }
        // $q = DB::table('tanggapan')->where('idt', $idt)->get();
        // if ($q == null) {
        //     return 0;
        // } else {
        //     $q2 = DB::table('tanggapan')->select('tanggapan.idtn', 'dukungan_tanggapan.pilihan')
        //         ->leftJoin('dukungan_tanggapan', 'tanggapan.idtn', '=', 'dukungan_tanggapan.idtn')
        //         ->where('dukungan_tanggapan.nim', Auth::user()->nim)->get()->toArray();

        //     $daftartanggapan = [];
        //     foreach ($q as $row) {
        //         $cari = array_search(
        //             $row->idtn,
        //             array_column($q2, 'idtn')
        //         );

        //         if (strval($cari) == null) {
        //             $pilihan = '';
        //         } else {
        //             $pilihan = $q2[$cari]->pilihan;
        //         }
        //         array_push($daftartanggapan, [
        //             'idtn' => $row->idtn,
        //             'nim' => $row->nim,
        //             'isi' => $row->isi,
        //             'date' => $row->date,
        //             'tdukungan' => $row->tdukungan,
        //             'pilihan' => $pilihan
        //         ]);
        //     }

        //     return response()->json($daftartanggapan);
        // }
    }
}
