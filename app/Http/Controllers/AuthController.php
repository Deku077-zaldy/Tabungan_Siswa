<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        $user = Auth::user();
        // dd($user);
        // Jika wali kelas
        if ($user->role === 'wali_kelas') {
            return view('dashboard');
        }

        // Jika siswa
        if ($user->role === 'siswa') {
            return view('dashboard');
        }
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }


    public function login(Request $request)
    {
        // Validasi
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt login
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd('LOGIN BERHASIL', Auth::user());
            return redirect()->route('dashboard.index')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah.')->withInput();
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user-profile', compact('user'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('status', 'Berhasil logout');
    }
}
