<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil kelas wali dari tabel users
        $kelasWali = auth()->user()->kelas;

        // Ambil ID wali kelas dari tabel users
        $waliId = auth()->user()->waliKelas->id;

        // Ambil semua siswa yang wali_kelas_id cocok dengan wali yang login
        $siswaKelas = Siswa::where('wali_kelas_id', $waliId)
            ->where('status', 'aktif')
            ->with('transaksi')
            ->get();
        // dd($siswaKelas);

        return view('admin.account-siswa', compact('siswaKelas', 'kelasWali'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-account-siswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $waliId = Auth::user()->id;

        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'nama'     => 'required',
            'kelas'    => 'required|integer|between:1,6',
            'no_hp'    => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role'     => 'siswa',
                'no_hp'    => $request->no_hp,
                'kelas'    => $request->kelas,
            ]);

            $waliKelas = User::where('role', 'wali_kelas')
                ->where('kelas', $request->kelas)
                ->first();
            if (!$waliKelas) {
                return redirect()->back()->with('error', 'Wali kelas untuk kelas ' . $request->kelas . ' tidak ditemukan.');
            }

            Siswa::create([
                'user_id' => $user->id,
                'nama'    => $request->nama,
                'wali_kelas_id' => $waliKelas->waliKelas->id,
                'status'  => 'aktif',
            ]);

            DB::commit();

            return redirect()->route('user-siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function student_history(string $id)
    {
        // cari siswa berdasarkan ID siswa
        $siswa = Siswa::findOrFail($id);

        // Ambil semua transaksi siswa
        $transaksi = $siswa->transaksi()
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        // dd($transaksi);
        return view('admin.siswa-history', compact('transaksi', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);
        return view('admin.edit-account-siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $siswa->user->id,
            'nama'     => 'required',
            'no_hp'    => 'required',
            'status'   => 'required|in:aktif,non-aktif',
            'password' => 'nullable|min:6', // password opsional
        ]);

        DB::beginTransaction();

        try {
            // Data user
            $userData = [
                'username' => $request->username,
                'no_hp'    => $request->no_hp,
            ];

            // ✅ update password HANYA jika diisi
            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $siswa->user->update($userData);

            // Update data siswa
            $siswa->update([
                'nama'   => $request->nama,
                'status' => $request->status,
            ]);

            DB::commit();

            return redirect()->route('user-siswa.index')
                ->with('success', 'Data siswa berhasil diperbarui.');
        } catch (\Exception $e) {

            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function history()
    {
        $user = Auth::user();

        // Pastikan user adalah siswa
        if (!$user->siswa) {
            abort(403, 'Hanya siswa yang dapat melihat halaman ini.');
        }

        // Ambil semua transaksi siswa
        $transaksi = $user->siswa->transaksi()
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        // dd($transaksi);
        return view('user.transaksi-history', compact('transaksi'));
    }

    /**
     * Display the specified resource.
     */
    public function report()
    {
        $siswa = auth()->user()->siswa;

        // Ambil semua transaksi siswa
        $months = $siswa->transaksi()
            ->selectRaw("DATE_FORMAT(tanggal, '%Y-%m') as ym")
            ->groupBy('ym')
            ->orderBy('ym', 'desc')
            ->get()
            ->map(function ($row) {
                return [
                    'ym' => $row->ym,
                    'label' => \Carbon\Carbon::parse($row->ym . '-01')->translatedFormat('F Y')
                ];
            });

        return view('user.transaksi-report', compact('months'));
    }


    public function downloadReport(Request $request)
    {
        $bulan = $request->bulan; // contoh: 2025-11
        [$tahun, $bulan_angka] = explode('-', $bulan);

        $siswa = auth()->user()->siswa;

        $transaksi = \App\Models\Transaksi::where('siswa_id', $siswa->id)
            ->whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan_angka)
            ->orderBy('tanggal')
            ->get();

        $pdf = Pdf::loadView('user.transaksi-report-pdf', [
            'siswa' => $siswa,
            'bulan' => $bulan,
            'transaksi' => $transaksi,
        ]);

        $nama_file = 'Laporan-' . Carbon::parse($bulan . '-01')->translatedFormat('F-Y') . '.pdf';

        return $pdf->download($nama_file);
    }

    public function naik_kelas(string $id)
    {
        DB::beginTransaction();

        try {
            $siswa = Siswa::with('user')
                ->where('id', $id)
                ->lockForUpdate() // 🔒 KUNCI DATA SISWA
                ->firstOrFail();

            if ($siswa->status !== 'aktif') {
                DB::rollBack();
                return redirect()->back()
                    ->with('error', 'Siswa tidak aktif dan tidak dapat naik kelas.');
            }

            // Jika kelas 6 → lulus
            if ($siswa->user->kelas >= 6) {
                $siswa->update(['status' => 'non-aktif']);
                DB::commit();

                return redirect()->back()
                    ->with('success', 'Siswa telah lulus dan dinon-aktifkan.');
            }

            // Naik kelas
            $kelasBaru = $siswa->user->kelas + 1;

            $siswa->user->update([
                'kelas' => $kelasBaru,
            ]);

            // Cari wali kelas
            $waliKelas = User::where('role', 'wali_kelas')
                ->where('kelas', $kelasBaru)
                ->first();

            if ($waliKelas) {
                $siswa->update([
                    'wali_kelas_id' => $waliKelas->waliKelas->id,
                ]);
            }

            DB::commit();

            return redirect()->back()
                ->with('success', 'Siswa berhasil naik ke kelas ' . $kelasBaru . '.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // public function naik_kelas(string $id)
    // {
    //     $siswa = Siswa::with('user')->findOrFail($id);

    //     if ($siswa->status !== 'aktif') {
    //         return redirect()->back()
    //             ->with('error', 'Siswa tidak aktif dan tidak dapat naik kelas.');
    //     }

    //     DB::beginTransaction();

    //     try {
    //         // Jika kelas 6 → lulus
    //         if ($siswa->user->kelas >= 6) {
    //             $siswa->update([
    //                 'status' => 'non-aktif',
    //             ]);

    //             DB::commit();

    //             return redirect()->back()
    //                 ->with('success', 'Siswa telah lulus dan dinon-aktifkan.');
    //         }

    //         // ✅ Naik kelas
    //         $kelasBaru = $siswa->user->kelas + 1;

    //         $siswa->user->update([
    //             'kelas' => $kelasBaru,
    //         ]);

    //         // ✅ Cari wali kelas sesuai kelas baru
    //         $waliKelas = User::where('role', 'wali_kelas')
    //             ->where('kelas', $kelasBaru)
    //             ->first();

    //         // ✅ Update wali_kelas_id jika ditemukan
    //         if ($waliKelas) {
    //             $siswa->update([
    //                 'wali_kelas_id' => $waliKelas->waliKelas->id,
    //             ]);
    //         }

    //         DB::commit();

    //         return redirect()->back()
    //             ->with('success', 'Siswa berhasil naik ke kelas ' . $kelasBaru . '.');
    //     } catch (\Exception $e) {

    //         DB::rollBack();

    //         return redirect()->back()
    //             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }
}
