<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\VarDumper\VarDumper;

class Authen extends Controller
{
    public function register(Request $request)
    {
        $nim = $request->nim;
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;


        $user = DB::table('users')->where(['email' => $email])->first();

        if ($user != null) {
            return 'Sudah terdaftar';
        } else {
            $stt = [
                'nama' => strtoupper($nama),
                'nim' => $nim,
                'email' => $email,
                'password' => Hash::make($password),
                'gambar' => '',
                'nowa' => '',
                'deskripsi' => '',
                'alamat' => '',
                'is_admin' => 0,
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
                return url('/user');
            } else {
                return "Password salah";
            }
        } else {
            return "Tidak terdaftar";
        }
    }

    public function adminlogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where(['email' => $email])->first();

        if ($user != null) {
            if (Hash::check($password, $user->password)) {
                Auth::attempt(['email' => $email, 'password' => $password]);
                return url('/admin');
            } else {
                return "Password salah";
            }
        } else {
            return "Tidak terdaftar";
        }
    }

    public function adminlogout()
    {
        Auth::logout();
        return url('/admin/login');
    }

    public function logout()
    {
        Auth::logout();
        return url('/login');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();

            $email = $user_google->getEmail();

            if (explode("@", $email)[1] != "stis.ac.id") {
                return redirect()->route('logingagal');
            };

            $password = '00000';
            if ($user != null) {
                Auth::attempt(['email' => $email, 'password' => $password]);
            } else {
                $stt = [
                    'nama' => strtoupper($user_google->getName()),
                    'nim' => explode("@", $email)[0],
                    'email' => $email,
                    'password' => Hash::make($password),
                    'gambar' => $user_google->getAvatar(),
                    'nowa' => '',
                    'deskripsi' => '',
                    'alamat' => '',
                    'is_admin' => 0,
                    'api_token' => Str::random(40),
                ];
                DB::table('users')->insert($stt);
                Auth::attempt(['email' => $email, 'password' => $password]);
            }
            return redirect('/user');
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
