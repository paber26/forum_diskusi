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
            'email' => Auth::user()->email,
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
            $q = DB::table('forum')->select('forum.*', 'dukungan_pertanyaan.pilihan')
                ->leftJoin('dukungan_pertanyaan', 'forum.fid', '=', 'dukungan_pertanyaan.fid')
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'se') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_pertanyaan.pilihan')
                ->leftJoin('dukungan_pertanyaan', 'forum.fid', '=', 'dukungan_pertanyaan.fid')
                ->where('forum.se', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'sk') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_pertanyaan.pilihan')
                ->leftJoin('dukungan_pertanyaan', 'forum.fid', '=', 'dukungan_pertanyaan.fid')
                ->where('forum.sk', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'si') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_pertanyaan.pilihan')
                ->leftJoin('dukungan_pertanyaan', 'forum.fid', '=', 'dukungan_pertanyaan.fid')
                ->where('forum.si', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'sd') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_pertanyaan.pilihan')
                ->leftJoin('dukungan_pertanyaan', 'forum.fid', '=', 'dukungan_pertanyaan.fid')
                ->where('forum.sd', 1)
                ->orderByDesc('forum.date')->get();
        } else if ($peminatan == 'd3') {
            $q = DB::table('forum')->select('forum.*', 'dukungan_pertanyaan.pilihan')
                ->leftJoin('dukungan_pertanyaan', 'forum.fid', '=', 'dukungan_pertanyaan.fid')
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
        $email = Auth::user()->email;

        $q = DB::table('dukungan_pertanyaan')->where(['fid' => $fid, 'email' => $email]);

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
                'email' => $email,
                'pilihan' => $pilihan
            ];
            DB::table('dukungan_pertanyaan')->insert($stt);
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

    public function getdetailsoalforum($fid)
    {
        $pertanyaan = DB::table('forum')->where('fid', $fid)->first();
        $jawaban = DB::table('jawaban_forum')->select('jawaban_forum.*', 'dukungan_jawabanforum.pilihan')
            ->leftJoin('dukungan_jawabanforum', 'jawaban_forum.jfid', '=', 'dukungan_jawabanforum.jfid')
            ->orderByDesc('jawaban_forum.date')->where('fid', $fid)->get();
        if ($jawaban == null) {
            $jawaban = 0;
        }
        return response()->json(array($pertanyaan, $jawaban));
    }

    public function tambahjawabanforum(Request $request)
    {
        $fid = $request->fid;
        $q = DB::table('forum')->where('fid', $fid);
        $jlhjawaban = $q->first()->jlhjawaban;

        $q->update(['jlhjawaban' => $jlhjawaban + 1]);

        $stt = [
            'jfid' => uniqid(),
            'fid' => $fid,
            'email' => Auth::user()->email,
            'jawaban' => $request->jawaban,
            'dukungan' => 0
        ];
        DB::table('jawaban_forum')->insert($stt);

        return 'Berhasil';
    }

    public function dukunganjawabanforum(Request $request)
    {
        $jfid = $request->jfid;
        $pilihan = $request->pilihan;
        $email = Auth::user()->email;
        $q = DB::table('dukungan_jawabanforum')->where(['jfid' => $jfid, 'email' => $email]);

        $q2 = DB::table('jawaban_forum')->where('jfid', $jfid);
        $jlhdukungan = $q2->first()->dukungan;

        if ($q->first() == null) {
            if ($pilihan == 'naik') {
                $q2->update(['dukungan' => $jlhdukungan + 1]);
            } else if ($pilihan == 'turun') {
                $q2->update(['dukungan' => $jlhdukungan - 1]);
            }
            $stt = [
                'jfid' => $jfid,
                'email' => $email,
                'pilihan' => $pilihan
            ];
            DB::table('dukungan_jawabanforum')->insert($stt);
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
