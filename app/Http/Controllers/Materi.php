<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Materi extends Controller
{

    public function getdaftarmatkul($prodi)
    {
        if ($prodi == 'd4st') {
            return DB::table('matkul')->where('se', 1)->orWhere('sd', 1)->get();
        } else if ($prodi == 'd4ks') {
            return DB::table('matkul')->where('sd', 1)->orWhere('si', 1)->get();
        } else if ($prodi == 'd3') {
            return DB::table('matkul')->where('d3', 1)->get();
        }
    }

    public function getdaftarMaterid4ks()
    {
        return DB::table('matkul')->where('prodi', 'D4 Komputasi Statistik')->get();
    }

    public function getimid($mid)
    {
        $q = DB::table('materi')->where('mid', $mid)->get();
        if ($q == null) {
            return 0;
        } else {
            return $q->first()->imid;
        }
    }

    public function getnamamatkul($mid)
    {
        return DB::table('matkul')->where('mid', $mid)->first()->nama;
    }

    public function getdaftarmateri($mid)
    {
        $q = DB::table('materi')->select('topik', 'imid', 'urutan')->where('mid', $mid);
        if ($q == null) {
            return 0;
        } else {
            return response()->json(array($q->get(), $q->count()));
        }
    }

    public function getmateri($imid)
    {
        $q = DB::table('materi')->where('imid', $imid)->first();
        if ($q == null) {
            return 0;
        } else {
            return $q;
        }
    }
}
