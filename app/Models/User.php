<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role',
        'kelas',
        'no_hp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // === Tambahkan ini untuk memastikan Auth pakai kolom username ===
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function getAuthIdentifier()
    {
        return $this->username;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function waliKelas()
    {
        return $this->hasOne(WaliKelas::class);
    }

    public function infoTabungan()
    {
        if (!$this->siswa) {
            return [
                'total' => 0,
                'transaksi_terakhir' => null,
            ];
        }

        $transaksi = $this->siswa->transaksi();

        // hitung saldo
        $setor = $this->siswa->transaksi()->where('jenis', 'setor')->sum('jumlah');
        $tarik = $this->siswa->transaksi()->where('jenis', 'tarik')->sum('jumlah');
        $total = $setor - $tarik;

        // dapatkan transaksi terakhir (tanpa terpengaruh filter sebelumnya)
        $terakhir = $this->siswa->transaksi()
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();

        return [
            'total' => $total,
            'transaksi_terakhir' => $terakhir,
        ];
    }
}
