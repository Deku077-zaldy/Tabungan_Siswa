<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $info = Auth::user()->infoTabungan();
            $idSiswa = $user->siswa->id;
            $totalSaldoPerTahun = DB::select("
                SELECT 
                    YEAR(tanggal) AS tahun,
                    SUM(CASE WHEN jenis = 'setor' THEN jumlah ELSE 0 END) -
                    SUM(CASE WHEN jenis = 'tarik' THEN jumlah ELSE 0 END) AS total_tabungan
                FROM transaksi
                WHERE siswa_id = ?
                GROUP BY YEAR(tanggal)
                ORDER BY tahun ASC
            ", [$idSiswa]);

            return view('dashboard', compact('info', 'totalSaldoPerTahun'));
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

    public function resetPassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'new_password_confirmation' => 'required|same:new_password',
        ]);


        // cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password saat ini tidak sesuai.');
        }

        // cek user id
        if ($user->id != $request->user_id) {
            return back()->with('error', 'User ID tidak sesuai.');
        }

        // update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diubah.');
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
