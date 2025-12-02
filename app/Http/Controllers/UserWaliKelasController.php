<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserWaliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $waliKelas = WaliKelas::with('user')->get();
        // dd($waliKelas);
        return view('admin.account-wali', compact('waliKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-account-wali');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'nama'     => 'required',
            'nip'      => 'required|unique:wali_kelas,nip',
            'kelas'    => 'required|numeric',
            'no_hp'    => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role'     => 'wali_kelas',
                'no_hp'    => $request->no_hp,
                'kelas'    => $request->kelas,
            ]);

            WaliKelas::create([
                'user_id' => $user->id,
                'nama'    => $request->nama,
                'nip'     => $request->nip
            ]);

            DB::commit();

            return redirect()->route('user-wali.index')->with('success', 'Wali kelas berhasil ditambahkan.');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wali = WaliKelas::with('user')->findOrFail($id);
        return view('admin.edit-account-wali', compact('wali'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wali = WaliKelas::with('user')->findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $wali->user->id,
            'nama'     => 'required',
            'nip'      => 'required|unique:wali_kelas,nip,' . $wali->id,
            'kelas'    => 'required|numeric',
            'no_hp'    => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Update data user (tanpa update password)
            $wali->user->update([
                'username' => $request->username,
                'no_hp'    => $request->no_hp,
                'kelas'    => $request->kelas,
            ]);

            // Update data wali_kelas
            $wali->update([
                'nama' => $request->nama,
                'nip'  => $request->nip,
            ]);

            DB::commit();

            return redirect()->route('user-wali.index')
                ->with('success', 'Data wali kelas berhasil diperbarui.');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
