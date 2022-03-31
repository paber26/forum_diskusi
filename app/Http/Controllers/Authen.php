<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Authen extends Controller
{
    public function register(Request $request)
    {
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where(['email' => $email])->first();

        if ($user != null) {
            return 'Sudah terdaftar';
        } else {
            $stt = [
                'nama' => strtoupper($nama),
                'email' => $email,
                'password' => Hash::make($password),
                'gambar' => '',
                'api_token' => Str::random(40),
            ];
            DB::table('users')->insert($stt);

            return 'Berhasil';
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where(['email' => $email])->first();

        if ($user != null) {
            if (Hash::check($password, $user->password)) {
                Auth::attempt(['email' => $email, 'password' => $password]);
                return url('/');
            } else {
                return "Password salah";
            }
        } else {
            return "Tidak terdaftar";
        }
    }
}
