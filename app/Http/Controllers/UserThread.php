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

    public function getthread2($idt = null)
    {
        if ($idt === null) {
            $q = DB::table('thread')->orderBy('date', 'desc')->get();
            if ($q == null) {
                return 0;
            } else {
                return $q;
            }
        } else {
            return DB::table('thread')->where('idt', $idt)->first();
        }
    }

    public function getthread($idt = null)
    {
        if ($idt === null) {
            $q = DB::table('thread')->orderBy('date', 'desc')->get();
            // return $q;
            if ($q == null) {
                return 0;
            } else {
                $q2 = DB::table('thread')->select('thread.idt', 'dukungan_thread.pilihan')
                    ->leftJoin('dukungan_thread', 'thread.idt', '=', 'dukungan_thread.idt')
                    ->where('dukungan_thread.nim', Auth::user()->nim)->get()->toArray();

                $daftarthread = [];
                foreach ($q as $row) {
                    $cari = array_search(
                        $row->idt,
                        array_column($q2, 'idt')
                    );


                    if (strval($cari) == null) {
                        $pilihan = '';
                    } else {
                        $pilihan = $q2[$cari]->pilihan;
                    }
                    array_push($daftarthread, [
                        'idt' => $row->idt,
                        'nim' => $row->nim,
                        'judul' => $row->judul,
                        'isi' => $row->isi,
                        'date' => $row->date,
                        'tdukungan' => $row->tdukungan,
                        'tmenanggapi' => $row->tmenanggapi,
                        'tmelihat' => $row->tmelihat,
                        'pilihan' => $pilihan
                    ]);
                }

                return response()->json($daftarthread);
            }
        } else {
            $q = DB::table('thread')->where('idt', $idt)->first();
            $q2 = DB::table('dukungan_thread')->where(['idt' => $idt, 'nim' => Auth::user()->nim])->first();

            if ($q2 == null) {
                $pilihan = '';
            } else {
                $pilihan = $q2->pilihan;
            }
            // return $pilihan;
            return [
                'idt' => $q->idt,
                'nim' => $q->nim,
                'judul' => $q->judul,
                'isi' => $q->isi,
                'date' => $q->date,
                'tdukungan' => $q->tdukungan,
                'tmenanggapi' => $q->tmenanggapi,
                'tmelihat' => $q->tmelihat,
                'pilihan' => $pilihan
            ];
        }
    }

    public function getthread_($idt = null)
    {
        $q = DB::table('thread')->select('thread.*', 'dukungan_thread.pilihan')
            ->leftJoin('dukungan_thread', 'thread.idt', '=', 'dukungan_thread.idt')
            ->where('dukungan_thread.nim', Auth::user()->nim)
            ->orWhereNull('dukungan_thread.nim');
        $q = DB::table('thread')->get();
        return $q;

        $q = DB::table('thread')->get();

        $q2 = DB::table('thread')->select('thread.*', 'dukungan_thread.pilihan')
            ->leftJoin('dukungan_thread', 'thread.idt', '=', 'dukungan_thread.idt')
            ->where('dukungan_thread.nim', Auth::user()->nim)->get()->toArray();

        // $q2 = DB::table('dukung_thread')->select('questionsskd.sn')
        // ->leftJoin('questionsskd', 'user_answerskd.qid', '=', 'questionsskd.qid')
        // ->where(['user_answerskd.username' => $username, 'questionsskd.eid' => $eid])->get()->toArray();

        $daftarthread = [];
        foreach ($q as $row) {
            $cari = array_search(
                $row->nim,
                array_column($q2, '')
            );
        }

        $daftarsoal = [];
        foreach ($q as $row) {
            $cari = array_search(
                $row->sn,
                array_column($q2, 'sn')
            );
            if (strval($cari) != "") {
                $terjawab = true;
            } else {
                $terjawab = false;
            }
            array_push($daftarsoal, [
                'qid' => $row->qid,
                'qns' => $row->qns,
                'sn' => $row->sn,
                'terjawab' => $terjawab
            ]);
        }
        return response()->json($daftarsoal);

        foreach ($q as $t) {
        }

        return $q->orderBy('date', 'desc')->get();
        if ($idt === null) {
            // if ($peminatan == 'all') {
            //     $q = DB::table('forum')->select('forum.*', 'dukungan_pertanyaan.pilihan')
            //     ->leftJoin('dukungan_pertanyaan', 'forum.fid', '=', 'dukungan_pertanyaan.fid')
            //     ->orderByDesc('forum.date')->get();
            // }
            // $q = DB::table('thread')->orderBy('date', 'desc')->get();
            // if ($q->get() == null) {
            //     return 0;
            // } else {
            //     return $q->orderBy('date', 'desc')->get();
            // }
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
    }

    public function dukungthread(Request $request)
    {
        $idt = $request->idt;
        $pilihan = $request->pilihan;
        $nim = Auth::user()->nim;

        $q = DB::table('dukungan_thread')->where(['idt' => $idt, 'nim' => $nim]);

        $q2 = DB::table('thread')->where('idt', $idt);
        $jlhdukungan = $q2->first()->tdukungan;

        if ($q->first() == null) {
            if ($pilihan == 'naik') {
                $q2->update(['tdukungan' => $jlhdukungan + 1]);
            } else if ($pilihan == 'turun') {
                $q2->update(['tdukungan' => $jlhdukungan - 1]);
            }
            $stt = [
                'idt' => $idt,
                'nim' => $nim,
                'pilihan' => $pilihan
            ];
            DB::table('dukungan_thread')->insert($stt);
            return 'Berhasil';
        } else {
            if (($q->first()->pilihan == 'naik') && ($pilihan == 'naik')) {
                $q->delete();
                $q2->update(['tdukungan' => $jlhdukungan - 1]);
            } else if (($q->first()->pilihan == 'naik') && ($pilihan == 'turun')) {
                $q->update(['pilihan' => 'turun']);
                $q2->update(['tdukungan' => $jlhdukungan - 2]);
            } else if (($q->first()->pilihan == 'turun') && ($pilihan == 'turun')) {
                $q->delete();
                $q2->update(['tdukungan' => $jlhdukungan + 1]);
            } else if (($q->first()->pilihan == 'turun') && ($pilihan == 'naik')) {
                $q->update(['pilihan' => 'naik']);
                $q2->update(['tdukungan' => $jlhdukungan + 2]);
            }
        }
    }
}
