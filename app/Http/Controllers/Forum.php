<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Forum extends Controller
{
    public function tambahpertanyaan(Request $request)
    {
        $stt = [
            'fid' => uniqid(),
            'pertanyaan' => $request->pertanyaan,
            'username' => Auth::user()->email,
            'dukungan' => 0,
            'se' => $request->se,
            'sk' => $request->sk,
            'sd' => $request->sd,
            'si' => $request->si,
            'd3' => $request->d3,
        ];
        DB::table('forum')->insert($stt);

        return 'Berhasil';
    }

    public function getdaftarforum($peminatan)
    {
        if ($peminatan == 'all') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_forum.pilihan')
                ->leftJoin('dukungan_forum', 'forum.fid', '=', 'dukungan_forum.fid')
                ->orderByDesc('forum.date')->get();

            return $q;
        } else if ($peminatan == 'se') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_forum.pilihan')
                ->leftJoin('dukungan_forum', 'forum.fid', '=', 'dukungan_forum.fid')
                ->where('forum.se', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'sk') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_forum.pilihan')
                ->leftJoin('dukungan_forum', 'forum.fid', '=', 'dukungan_forum.fid')
                ->where('forum.sk', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'si') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_forum.pilihan')
                ->leftJoin('dukungan_forum', 'forum.fid', '=', 'dukungan_forum.fid')
                ->where('forum.si', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'sd') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_forum.pilihan')
                ->leftJoin('dukungan_forum', 'forum.fid', '=', 'dukungan_forum.fid')
                ->where('forum.sd', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'd3') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_forum.pilihan')
                ->leftJoin('dukungan_forum', 'forum.fid', '=', 'dukungan_forum.fid')
                ->where('forum.d3', 1)
                ->orderByDesc('forum.date')->get();
        }
        if ($q == null) {
            return 0;
        } else {
            return $q;
        }
    }

    public function dukunganforum(Request $request)
    {
        $fid = $request->fid;
        $pilihan = $request->pilihan;
        $username = Auth::user()->email;

        $q = DB::table('dukungan_forum')->where(['fid' => $fid, 'username' => $username]);

        $q2 = DB::table('forum')->where('fid', $fid);
        $jlhdukungan = $q2->first()->dukungan;

        if ($q->first() == null) {
            if ($pilihan == 'naik') {
                $q2->update(['dukungan' => $jlhdukungan + 1]);
            } else if ($pilihan == 'turun') {
                $q2->update(['dukungan' => $jlhdukungan - 1]);
            }
            $stt = [
                'fid' => $fid,
                'username' => $username,
                'pilihan' => $pilihan
            ];
            DB::table('dukungan_forum')->insert($stt);
            return 'Berhasil';
        } else {
            if (($q->first()->pilihan == 'naik') && ($pilihan == 'naik')) {
                $q->delete();
                $q2->update(['dukungan' => $jlhdukungan - 1]);
            } else if (($q->first()->pilihan == 'naik') && ($pilihan == 'turun')) {
                $q->update(['pilihan' => 'turun']);
                $q2->update(['dukungan' => $jlhdukungan - 2]);
            } else if (($q->first()->pilihan == 'turun') && ($pilihan == 'turun')) {
                $q->delete();
                $q2->update(['dukungan' => $jlhdukungan + 1]);
            } else if (($q->first()->pilihan == 'turun') && ($pilihan == 'naik')) {
                $q->update(['pilihan' => 'naik']);
                $q2->update(['dukungan' => $jlhdukungan + 2]);
            }
        }
    }
}
