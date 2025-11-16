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
}
