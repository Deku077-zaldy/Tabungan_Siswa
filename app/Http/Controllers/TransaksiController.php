<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    // Inject WhatsAppService melalui constructor
    public function __construct(
        protected WhatsAppService $waService
    ) {}
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
        $datasiswa = Siswa::where('wali_kelas_id', $waliId)->where('status', 'aktif')->with('transaksi')->get()->map(function ($siswa) {
            return [
                'id' => $siswa->id,
                'nama' => $siswa->nama,
                'total_tabungan' => $siswa->total_tabungan, // accessor
            ];
        });

        // dd($datasiswa);

        return view('admin.transaksi', compact('datasiswa', 'kelasWali'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $siswa = Siswa::with(['transaksi'])->findOrFail($id);
        $waliKelasID = auth()->user()->waliKelas->id;
        return view('admin.create-transaksi', compact('siswa', 'waliKelasID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'siswa_id'    => 'required|exists:siswa,id',
            'jumlah'      => 'required|numeric|min:1000',
            'jenis'       => 'required|in:setor,tarik',
            'catatan'     => 'nullable|string|max:255',
            'dibuat_oleh' => 'required|exists:wali_kelas,id',
        ]);

        // AMBIL DATA SISWA
        $siswa = Siswa::findOrFail($request->siswa_id);
        $noSiswa = $siswa->user->no_hp;
        // hilangkan spasi & karakter aneh
        $noSiswa = preg_replace('/[^0-9+]/', '', $noSiswa);

        if (str_starts_with($noSiswa, '0')) {
            // 08xxx → 628xxx
            $noSiswa = '62' . substr($noSiswa, 1);
        } elseif (str_starts_with($noSiswa, '+62')) {
            // +62xxx → 62xxx
            $noSiswa = substr($noSiswa, 1);
        }

        $totalTabungan = $siswa->total_tabungan;

        // VALIDASI TARIK TIDAK BOLEH > SALDO
        if ($request->jenis === 'tarik' && $request->jumlah > $totalTabungan) {
            return back()
                ->withErrors([
                    'jumlah' => 'Jumlah penarikan melebihi saldo tabungan'
                ])
                ->withInput();
        }

        DB::beginTransaction();

        try {

            // SIMPAN TRANSAKSI
            Transaksi::create([
                'siswa_id'     => $request->siswa_id,
                'dibuat_oleh' => $request->dibuat_oleh,
                'jenis'        => $request->jenis,
                'jumlah'       => $request->jumlah,
                'tanggal'      => now(),
                'catatan'      => $request->catatan,
            ]);

            DB::commit();

            $pesan =
                "📢 *Informasi Sistem Tabsis*\n\n" .
                "Siswa atas nama *" . strtoupper($siswa->nama) . "* telah " .
                ($request->jenis === 'tarik' ? '*Melakukan Penarikan*' : '*Menabung*') .
                " sejumlah *Rp " . number_format($request->jumlah, 0, ',', '.') . "*.\n\n" .
                "Terima kasih.\n" .
                "_Pesan ini dibuat otomatis dan tidak perlu dibalas._";


            $response = $this->waService->sendMessage($pesan, $noSiswa);

            return redirect()
                ->route('transaksi.index')
                ->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
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
