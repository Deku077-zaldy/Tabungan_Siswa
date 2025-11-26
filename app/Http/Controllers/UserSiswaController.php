<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UserSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.account-siswa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
}
