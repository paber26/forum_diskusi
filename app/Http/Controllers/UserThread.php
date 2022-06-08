<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserThread extends Controller
{
    public function buat_thread(Request $request)
    {
        $judul = $request->judul;
        $isi = $request->isi;

        // $nama = $request->nama;
        // $email = $request->email;
        // $password = $request->password;

        // $user = DB::table('users')->where(['email' => $email])->first();

        // if ($user != null) {
        //     return 'Sudah terdaftar';
        // } else {
        //     $stt = [
        //         'nama' => strtoupper($nama),
        //         'email' => $email,
        //         'password' => Hash::make($password),
        //         'gambar' => '',
        //         'api_token' => Str::random(40),
        //     ];
        //     DB::table('users')->insert($stt);

        //     return 'Berhasil';
        // }

        return $isi;
    }
}
