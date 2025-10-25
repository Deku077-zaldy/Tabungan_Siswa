<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\WaliKelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ==============================
        // 1️⃣ Buat User Wali Kelas
        // ==============================
        $wali1 = User::create([
            'username' => 'wali_kelas_5a',
            'password' => Hash::make('password'),
            'role' => 'wali_kelas',
        ]);

        $wali2 = User::create([
            'username' => 'wali_kelas_6a',
            'password' => Hash::make('password'),
            'role' => 'wali_kelas',
        ]);

        // ==============================
        // 2️⃣ Buat Data Wali Kelas
        // ==============================
        $waliKelas1 = WaliKelas::create([
            'user_id' => $wali1->id,
            'nama' => 'Ibu Rina',
            'kelas' => '5A',
        ]);

        $waliKelas2 = WaliKelas::create([
            'user_id' => $wali2->id,
            'nama' => 'Bapak Dedi',
            'kelas' => '6A',
        ]);

        // ==============================
        // 3️⃣ Buat User Siswa
        // ==============================
        $siswaUsers = [];
        for ($i = 1; $i <= 5; $i++) {
            $siswaUsers[] = User::create([
                'username' => 'siswa' . $i,
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ]);
        }

        // ==============================
        // 4️⃣ Buat Data Siswa
        // ==============================
        $siswas = [];
        foreach ($siswaUsers as $index => $user) {
            $wali = $index < 3 ? $waliKelas1 : $waliKelas2; // 3 siswa ke wali 5A, sisanya ke 6A

            $siswas[] = Siswa::create([
                'user_id' => $user->id,
                'wali_kelas_id' => $wali->id,
                'no_hp' => '08' . rand(1000000000, 9999999999),
                'nama' => 'Siswa ' . ($index + 1),
                'status' => 'aktif',
            ]);
        }

        // ==============================
        // 5️⃣ Buat Transaksi Tabungan
        // ==============================
        foreach ($siswas as $siswa) {
            for ($i = 1; $i <= 3; $i++) {
                Transaksi::create([
                    'siswa_id' => $siswa->id,
                    'tanggal' => Carbon::now()->subDays(rand(0, 30)),
                    'jenis' => $i % 2 === 0 ? 'tarik' : 'setor',
                    'jumlah' => rand(5000, 50000),
                    'keterangan' => 'Transaksi ke-' . $i,
                    'dibuat_oleh' => $siswa->wali_kelas_id,
                ]);
            }
        }

        $this->command->info('✅ Database seeding berhasil!');
    }
}
