<?php

namespace App\Models;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    protected $table = 'wali_kelas';

    protected $fillable = [
        'user_id',
        'nama',
        'kelas',
    ];

    // === Relasi ===
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'wali_kelas_id');
    }

    public function transaksiTabungan()
    {
        return $this->hasMany(Transaksi::class, 'dibuat_oleh');
    }
}
