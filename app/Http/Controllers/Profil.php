<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Profil extends Controller
{
    public function edit(Request $request)
    {
        $deskripsi = $request->deskripsi;
        $kelas = $request->kelas;
        $nowa = $request->nowa;
        $alamat = $request->alamat;
        $password = $request->password;

        if ($deskripsi == null) {
            $deskripsi = '-';
        }
        if ($kelas == null) {
            $kelas = '-';
        }
        if ($nowa == null) {
            $nowa = '-';
        }
        if ($alamat == null) {
            $alamat = '-';
        }

        if ($password == null) {
            $stt = [
                'deskripsi' => $deskripsi,
                'kelas' => $kelas,
                'nowa' => $nowa,
                'alamat' => $alamat,
            ];
        } else {
            $stt = [
                'deskripsi' => $deskripsi,
                'kelas' => $kelas,
                'nowa' => $nowa,
                'alamat' => $alamat,
                'password' => Hash::make($password),
            ];
        }

        DB::table('users')->where('nim', Auth::user()->nim)->update($stt);

        return response()->json(array('Berhasil', url('/user/profil')));
    }

    public function getprofil($nim)
    {
        return DB::table('users')->where('nim', $nim)->first();
    }

    public function gettanggapanprofil($nim = null)
    {
        if ($nim == null) {
            $q = DB::table('tanggapan')
                ->select('tanggapan.*', 'users.nama', 'users.gambar', 'thread.judul', 'thread.nim AS nimt')
                ->leftJoin('thread', 'tanggapan.idt', '=', 'thread.idt')
                ->leftJoin('users', 'tanggapan.nim', '=', 'users.nim')
                ->orderBy('tanggapan.date', 'desc')
                ->where('tanggapan.nim', Auth::user()->nim)->get();
        } else {
            $q = DB::table('tanggapan')
                ->select('tanggapan.*', 'users.nama', 'users.gambar', 'thread.judul', 'thread.nim AS nimt')
                ->leftJoin('thread', 'tanggapan.idt', '=', 'thread.idt')
                ->leftJoin('users', 'tanggapan.nim', '=', 'users.nim')
                ->where('tanggapan.nim', $nim)->get();
        }

        $daftartanggapan = [];
        foreach ($q as $row) {
            array_push($daftartanggapan, [
                'idt' => $row->idt,
                'idtn' => $row->idtn,
                'namapemilik' => DB::table('users')->select('nama')->where('nim', $row->nimt)->first()->nama,
                'judul' => $row->judul,
                'isi' => $row->isi,
                'date' => $row->date,
            ]);
        }

        return response()->json(array(count($daftartanggapan), $daftartanggapan));
    }

    public function getthreadprofil($nim = null)
    {
        if ($nim == null) {
            $q = DB::table('thread')
                ->select('thread.*', 'users.nama', 'users.gambar')
                ->leftJoin('users', 'thread.nim', '=', 'users.nim')
                ->where('thread.nim', Auth::user()->nim)
                ->orderBy('thread.date', 'desc')
                ->get();
        } else {
            $q = DB::table('thread')
                ->select('thread.*', 'users.nama', 'users.gambar')
                ->leftJoin('users', 'thread.nim', '=', 'users.nim')
                ->where('thread.nim', $nim)->get();
        }
        if ($q == null) {
            return 0;
        } else {
            $q2 = DB::table('thread')->select('thread.idt', 'dukungan_thread.pilihan')
                ->leftJoin('dukungan_thread', 'thread.idt', '=', 'dukungan_thread.idt')
                ->where('dukungan_thread.nim', Auth::user()->nim)
                ->orderBy('thread.date', 'desc')
                ->get()->toArray();

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
                    'gambar' => $row->gambar,
                    'nama' => $row->nama,
                    'kategori' => $row->kategori,
                    'judul' => $row->judul,
                    'isi' => $row->isi,
                    'date' => $row->date,
                    'tdukungan' => $row->tdukungan,
                    'tmenanggapi' => $row->tmenanggapi,
                    'pilihan' => $pilihan
                ]);
            }

            return response()->json(array($q->count(), $daftarthread));
        }
    }

    public function getdaftarpengguna($keyword = null)
    {
        if ($keyword == null) {
            $q = DB::table('users')->orderBy('nama')->get();
        } else {
            $q = DB::table('users')->orderBy('nama')
                ->where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('nim', 'like', '%' . $keyword . '%')
                ->get();
        }

        // return 'yes';
        $daftarpengguna = [];
        foreach ($q as $row) {
            $tthread = DB::table('thread')->where('nim', $row->nim)->count();
            $ttanggapan = DB::table('tanggapan')->where('nim', $row->nim)->count();
            array_push($daftarpengguna, [
                'nim' => $row->nim,
                'nama' => $row->nama,
                'gambar' => $row->gambar,
                'tthread' => $tthread,
                'ttanggapan' => $ttanggapan,
            ]);
        }

        return $daftarpengguna;
    }
}
