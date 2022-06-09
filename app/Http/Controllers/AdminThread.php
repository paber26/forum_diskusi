<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminThread extends Controller
{
    public function getthread()
    {
        $q = DB::table('thread')->orderBy('date', 'desc')->get();
        return $q;
        if ($q == null) {
            return 0;
        } else {
            return $q;
        }
    }
}
