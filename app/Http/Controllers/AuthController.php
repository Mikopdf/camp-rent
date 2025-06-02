<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input dulu
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari akun berdasarkan username
        $akun = Akun::with('role')->where('username', $request->username)->first();

        // Cek apakah akun ada dan password cocok
        if (!$akun || !Hash::check($request->password, $akun->password)) {
            return back()->with('error', 'Username atau password salah')->withInput();
        }

        // Login menggunakan Laravel Auth
        Auth::login($akun);

        // Redirect berdasarkan role
        if ($akun->role->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($akun->role->role === 'customer') {
            return redirect()->route('customer.dashboard');
        }

        Auth::logout();
        abort(403);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input dulu
        $request->validate([
            'username' => 'required|string|unique:akuns,username',
            'password' => 'required|string|confirmed|min:6',
            'email' => 'required|email|unique:akuns,email',
            'nama_lengkap' => 'required|string|max:255',
        ]);

        // Buat akun baru
        $akun = Akun::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'role_id' => 2, // role customer
        ]);

        // Login otomatis setelah registrasi
        Auth::login($akun->load('role'));

        return redirect()->route('customer.dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
