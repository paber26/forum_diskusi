<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminThread extends Controller
{
    public function getjumlah()
    {
        $stt = [
            'thread' => DB::table('thread')->count(),
            'tanggapan' => DB::table('tanggapan')->count(),
            'users' => DB::table('users')->count()
        ];
        // $jthread = DB::table('thread')->count();
        // $jtanggapan = DB::table('tanggapan')->count();
        // $jpeserta = DB::table('users')->count();
        // return response()->json(array($jthread, $jtanggapan, $jpeserta));
        return $stt;
    }

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
            return DB::table('thread')->select('thread.*', 'users.nama')
                ->leftJoin('users', 'thread.nim', '=', 'users.nim')
                ->where('idt', $idt)->first();
        }
    }

    public function gettanggapan($idt = null)
    {
        if ($idt == null) {
            return DB::table('tanggapan AS tn')
                ->select('tn.idtn', 'tn.date', 'tn.nim AS nimtn', 'tn.isi', 't.idt', 't.nim AS nimt', 't.judul', 'users.nama')
                ->leftJoin('thread AS t', 'tn.idt', '=', 't.idt')
                ->leftJoin('users', 'tn.nim', '=', 'users.nim')
                ->orderBy('tn.date', 'desc')
                ->get();
        } else {
            return DB::table('tanggapan')->where('idt', $idt)->get();
        }
    }
}
