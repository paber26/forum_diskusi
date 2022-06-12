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
        $nowa = $request->nowa;
        $alamat = $request->alamat;
        $password = $request->password;

        if ($deskripsi == null) {
            $deskripsi = '-';
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
                'nowa' => $nowa,
                'alamat' => $alamat,
            ];
        } else {
            $stt = [
                'deskripsi' => $deskripsi,
                'nowa' => $nowa,
                'alamat' => $alamat,
                'password' => Hash::make($password),
            ];
        }

        DB::table('users')->where('nim', Auth::user()->nim)->update($stt);

        return response()->json(array('Berhasil', url('/user/profil')));
    }

    public function gettanggapanprofil()
    {
        $q = DB::table('tanggapan')->join('thread', 'tanggapan.idt', '=', 'thread.idt')
            ->select('thread.judul', 'tanggapan.*', 'users.nama')
            ->select('thread.*', 'users.nama')
            ->leftJoin('users', 'thread.nim', '=', 'users.nim')
            ->get();

        return response()->json(array($q->count(), $q));
    }

    public function getthreadprofil()
    {
        $q = DB::table('thread')->where('nim', Auth::user()->nim)->get();
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

            return response()->json(array($q->count(), $daftarthread));
        }
    }
}
