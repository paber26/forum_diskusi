<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class UserThread extends Controller
{
    public function buat_thread(Request $request)
    {
        $isi = $request->isi;
        if ($isi == null) {
            $isi = '';
        }
        if ($request->draft == true) {
            $stt = [
                'idd' => uniqid(),
                'nim' => Auth::user()->nim,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'isi' => $isi,
            ];
            DB::table('draft_thread')->insert($stt);
        } else {
            $stt = [
                'idt' => uniqid(),
                'nim' => Auth::user()->nim,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'isi' => $isi,
            ];
            DB::table('thread')->insert($stt);
        }
        return 'Berhasil';
    }

    public function getdraftthread($idd = null)
    {
        if ($idd == null) {
            $q = DB::table('draft_thread')->where('nim', Auth::user()->nim)->get();
            if ($q == null) {
                return 0;
            } else {
                return $q;
            }
        } else {
            return DB::table('draft_thread')->where(['nim' => Auth::user()->nim, 'idd' => $idd])->first();
        }
    }

    public function getthreadfilter(Request $request)
    {
        $urutan = $request->urutan;
        $kategori = $request->kategori;

        // return $kategori;

        $q = DB::table('thread')
            ->select('thread.*', 'users.nama')
            ->leftJoin('users', 'thread.nim', '=', 'users.nim');

        if ($urutan == 'Terbaru' && $kategori == 'Semua') {
            $q = $q->orderBy('thread.date', 'desc')->get();
        } else if ($urutan == 'Terbaru' && $kategori != 'Semua') {
            $q = $q->where('thread.kategori', $kategori)
                ->orderBy('thread.date', 'desc')->get();
        }

        if ($urutan == 'Terlama' && $kategori == 'Semua') {
            $q = $q->orderBy('thread.date', 'asc')->get();
        } else if ($urutan == 'Terlama' && $kategori != 'Semua') {
            $q = $q->where('thread.kategori', $kategori)
                ->orderBy('thread.date', 'asc')->get();
        }

        if ($urutan == 'Populer' && $kategori == 'Semua') {
            $q = $q->orderBy('tdukungan', 'desc')->get();
        } else if ($urutan == 'Populer' && $kategori != 'Semua') {
            $q = $q->where('thread.kategori', $kategori)
                ->orderBy('tdukungan', 'desc')->get();
        }

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
                    'kategori' => $row->kategori,
                    'nama' => $row->nama,
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
    }

    public function getthread($idt = null)
    {
        if ($idt === null) {
            $q = DB::table('thread')
                ->select('thread.*', 'users.nama')
                ->leftJoin('users', 'thread.nim', '=', 'users.nim')
                ->orderBy('date', 'desc')->get();
            if ($q == null) {
                return 0;
            } else {
                $q2 = DB::table('thread')->select('thread.idt', 'dukungan_thread.pilihan')
                    ->leftJoin('dukungan_thread', 'thread.idt', '=', 'dukungan_thread.idt')
                    ->where('dukungan_thread.nim', Auth::user()->nim)->get()->toArray();
                // return $q2;

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
                        'kategori' => $row->kategori,
                        'nama' => $row->nama,
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
            $q = DB::table('thread')
                ->select('thread.*', 'users.nama')
                ->leftJoin('users', 'thread.nim', '=', 'users.nim')
                ->where('idt', $idt)->first();
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
                'nama' => $q->nama,
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
        $q2 = DB::table('tanggapan')->select('tanggapan.idtn', 'dukungan_tanggapan.pilihan')
            ->leftJoin('dukungan_tanggapan', 'tanggapan.idtn', '=', 'dukungan_tanggapan.idtn')
            ->where('dukungan_tanggapan.nim', Auth::user()->nim)->get()->toArray();

        $daftartanggapan = [];
        foreach ($q as $row) {
            $cari = array_search(
                $row->idtn,
                array_column($q2, 'idtn')
            );

            if (strval($cari) == null) {
                $pilihan = '';
            } else {
                $pilihan = $q2[$cari]->pilihan;
            }
            array_push($daftartanggapan, [
                'idtn' => $row->idtn,
                'nim' => $row->nim,
                'isi' => $row->isi,
                'date' => $row->date,
                'tdukungan' => $row->tdukungan,
                'pilihan' => $pilihan
            ]);
        }

        return response()->json($daftartanggapan);
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
            return $stt;
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

    public function dukungtanggapan(Request $request)
    {
        $idtn = $request->idtn;
        $pilihan = $request->pilihan;
        $nim = Auth::user()->nim;

        $q = DB::table('dukungan_tanggapan')->where(['idtn' => $idtn, 'nim' => $nim]);

        $q2 = DB::table('tanggapan')->where('idtn', $idtn);
        $jlhdukungan = $q2->first()->tdukungan;

        if ($q->first() == null) {
            if ($pilihan == 'naik') {
                $q2->update(['tdukungan' => $jlhdukungan + 1]);
            } else if ($pilihan == 'turun') {
                $q2->update(['tdukungan' => $jlhdukungan - 1]);
            }
            $stt = [
                'idtn' => $idtn,
                'nim' => $nim,
                'pilihan' => $pilihan
            ];
            DB::table('dukungan_tanggapan')->insert($stt);
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

    public function hapus($idd)
    {
        DB::table('draft_thread')->where(['idd' => $idd, 'nim' => Auth::user()->nim])->delete();

        return url('/user/buat_thread');
    }

    public function laporthread(Request $request)
    {
        $idt = $request->idt;

        $q = DB::table('laporan_thread')->where(['idt' => $idt, 'nim' => Auth::user()->nim])->first();

        if ($q == null) {
            $q2 = DB::table('thread')->where('idt', $idt);
            $tmelapor = $q2->first()->tmelapor;
            $q2->update(['tmelapor' => $tmelapor + 1]);
            $stt = [
                'idlt' => uniqid(),
                'nim' => Auth::user()->nim,
                'idt' => $idt,
            ];

            DB::table('laporan_thread')->insert($stt);
            return 'Berhasil';
        } else {
            return 'Sudah';
        }
    }
}
