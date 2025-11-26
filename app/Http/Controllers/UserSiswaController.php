<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
