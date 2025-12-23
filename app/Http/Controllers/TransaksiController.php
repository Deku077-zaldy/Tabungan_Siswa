<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
        $datasiswa = Siswa::where('wali_kelas_id', $waliId)->with('transaksi')->get()->map(function ($siswa) {
            return [
                'id' => $siswa->id,
                'nama' => $siswa->nama,
                'total_tabungan' => $siswa->total_tabungan, // accessor
            ];
        });

        // dd($datasiswa);

        return view('admin.transaksi', compact('datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $waliKelasID = auth()->user()->waliKelas->id;
        return view('admin.create-transaksi', compact('siswa', 'waliKelasID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
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
}
