<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transaksi;
use App\Models\WaliKelas;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'wali_kelas_id',
        'no_hp',
        'nama',
        'status',
    ];

    // === Relasi ===
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class, 'wali_kelas_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'siswa_id');
    }
}
