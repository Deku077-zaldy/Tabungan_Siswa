<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'jenis',
        'jumlah',
        'keterangan',
        'dibuat_oleh',
    ];

    // === Relasi ===
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class, 'dibuat_oleh');
    }
}
