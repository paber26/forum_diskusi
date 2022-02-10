<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Materi extends Controller
{
    public function getdaftarMaterid4ks()
    {
        return DB::table('matkul')->where('prodi', 'D4 Komputasi Statistik')->get();
    }
}
