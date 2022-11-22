<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('admin.akun.login');
    }

    public function attempt(Request $req)
    {
        $validasi = $req->validate([
            'name'  => 'required|exists:users,name',
            'password'  => 'required'
        ],
            [
                'name.required' =>  'Username tidak boleh kosong',
                'password.required' =>  'Password tidak boleh kosong',
                'name.exists'   =>  'Tidak Ditemukan Data yang Cocok',

            ]
        );
        if ($validasi) {
            // $validasi['password'] = Hash::make($req->password);
            // dd($validasi);
            if (Auth::attempt($validasi)) {
                $req->session()->regenerate();
                return redirect()->intended('karya-list');
            }else{
                return back()->withErrors([
                    'fail' => 'Login Gagal, Username atau Password Tidak Cocok',
                ]);
            }

        }
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('login');
    }

    public function register()
    {
        return view('admin.akun.regist');
    }


}
