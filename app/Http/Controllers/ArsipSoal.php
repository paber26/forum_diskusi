<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $pertanyaan = DB::table('arsipsoal')->where('asid', $asid)->first();
        if ($pertanyaan == null) {
            $pertanyaan = 0;
        }
        $jawaban = DB::table('jawaban_arsipsoal')->select('jawaban_arsipsoal.*', 'dukungan_arsipsoal.pilihan')
            ->leftJoin('dukungan_arsipsoal', 'jawaban_arsipsoal.jasid', '=', 'dukungan_arsipsoal.jasid')
            ->orderByDesc('jawaban_arsipsoal.date')->where('asid', $asid)->get();
        if ($jawaban == null) {
            $jawaban = 0;
        }
        return response()->json(array($pertanyaan, $jawaban));
    }

    public function tambahjawaban(Request $request)
    {
        $asid = $request->asid;
        $q = DB::table('arsipsoal')->where('asid', $asid);
        $jlhjawaban = $q->first()->jlhjawaban;

        $q->update(['jlhjawaban' => $jlhjawaban + 1]);

        $stt = [
            'jasid' => uniqid(),
            'asid' => $asid,
            'email' => Auth::user()->email,
            'jawaban' => $request->jawaban,
            'dukungan' => 0
        ];
        DB::table('jawaban_arsipsoal')->insert($stt);

        return 'Berhasil';
    }

    public function dukungan(Request $request)
    {
        $jasid = $request->jasid;
        $pilihan = $request->pilihan;
        $email = Auth::user()->email;

        $q = DB::table('dukungan_arsipsoal')->where(['jasid' => $jasid, 'email' => $email]);

        $q2 = DB::table('jawaban_arsipsoal')->where(['jasid' => $jasid, 'email' => $email]);
        $jlhdukungan = $q2->first()->dukungan;

        if ($q->first() == null) {
            if ($pilihan == 'naik') {
                $q2->update(['dukungan' => $jlhdukungan + 1]);
            } else if ($pilihan == 'turun') {
                $q2->update(['dukungan' => $jlhdukungan - 1]);
            }
            $stt = [
                'jasid' => $jasid,
                'email' => $email,
                'pilihan' => $pilihan
            ];
            DB::table('dukungan_arsipsoal')->insert($stt);
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
