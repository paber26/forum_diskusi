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
            'users' => DB::table('users')->count(),
            'laporan' => DB::table('laporan_thread')->count() + DB::table('laporan_tanggapan')->count()
        ];
        return $stt;
    }

    public function getthread($idt = null)
    {
        if ($idt == null) {
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

    public function hapus_thread($idt)
    {
        $tanggapan = DB::table('tanggapan')->select('idtn', 'nim')->where('idt', $idt)->get();

        foreach ($tanggapan as $row) {
            DB::table('tanggapan')->where('idtn', $row->idtn)->delete();
            DB::table('dukungan_tanggapan')->where('idtn', $row->idtn)->delete();
        }

        DB::table('dukungan_thread')->where('idt', $idt)->delete();
        DB::table('thread')->where('idt', $idt)->delete();
        return 'Berhasil';
    }

    public function gettanggapan($idt = null)
    {
        if ($idt == null) {
            return DB::table('tanggapan AS tn')
                ->select('tn.idtn', 'tn.date', 'tn.nim AS nimtn', 'tn.isi', 't.idt', 't.nim AS nimt', 't.judul', 't.kategori', 'users.nama')
                ->leftJoin('thread AS t', 'tn.idt', '=', 't.idt')
                ->leftJoin('users', 'tn.nim', '=', 'users.nim')
                ->orderBy('tn.date', 'desc')
                ->get();
        } else {
            return DB::table('tanggapan')->where('idt', $idt)->get();
        }
    }

    public function hapus_tanggapan($idt, $idtn)
    {
        $q2 = DB::table('thread')->where('idt', $idt);
        $tmenanggapi = $q2->first()->tmenanggapi;
        $q2->update(['tmenanggapi' => $tmenanggapi - 1]);

        DB::table('tanggapan')->where('idtn', $idtn)->delete();
        DB::table('dukungan_tanggapan')->where('idtn', $idtn)->delete();
        DB::table('laporan_tanggapan')->where('idtn', $idtn)->delete();

        return 'Berhasil';
    }

    public function getlaporan_thread()
    {
        return DB::table('laporan_thread AS lt')
            ->select('lt.date', 'lt.alasan', 'lt.idt', 't.date', 't.nim', 't.judul')
            ->leftJoin('thread AS t', 't.idt', '=', 'lt.idt')
            ->get();
    }

    public function getlaporan_tanggapan()
    {
        $daftarlaporan = [];
        $laporan = DB::table('laporan_tanggapan AS ltn')
            ->select('ltn.idltn', 'ltn.nim AS nimpelapor', 'ltn.idtn', 'ltn.alasan', 'tn.idt', 'tn.nim AS nimpemilik', 'tn.isi', 'tn.date')
            ->join('tanggapan AS tn', 'ltn.idtn', '=', 'tn.idtn')->get();
        foreach ($laporan as $l) {
            array_push($daftarlaporan, [
                'namapemilik' => DB::table('users')->where('nim', $l->nimpemilik)->first()->nama,
                'namapelapor' => DB::table('users')->where('nim', $l->nimpelapor)->first()->nama,
                'nimpemilik' => $l->nimpemilik,
                'nimpelapor' => $l->nimpelapor,
                'idltn' => $l->idltn,
                'idtn' => $l->idtn,
                'idt' => $l->idt,
                'judul' => DB::table('thread')->where('idt', $l->idt)->first()->judul,
                'isi' => $l->isi,
                'alasan' => $l->alasan,
                'date' => $l->date
            ]);
        }

        return $daftarlaporan;
    }

    public function hapus_laporantanggapan($idt, $idtn, $idltn)
    {
        // return array($idt, $idtn, $idltn);

        $q2 = DB::table('thread')->where('idt', $idt);
        $tmenanggapi = $q2->first()->tmenanggapi;
        $q2->update(['tmenanggapi' => $tmenanggapi - 1]);
        // return $tmenanggapi;

        // $q3 = DB::table('laporan_tanggapan')->where('idtn', $idtn)->count();

        DB::table('tanggapan')->where('idtn', $idtn)->delete();
        DB::table('dukungan_tanggapan')->where('idtn', $idtn)->delete();
        DB::table('laporan_tanggapan')->where('idltn', $idltn)->delete();

        return 'Berhasil';
    }

    public function getakun()
    {
        return DB::table('users')->select('nama', 'nim', 'is_admin')->get();
    }

    public function gantiakses($nim, $akses)
    {
        DB::table('users')->where('nim', $nim)->update(['is_admin' => $akses]);

        return 'Berhasil';
    }
}
