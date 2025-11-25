<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\WaliKelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ User Wali Kelas
        $wali1 = User::create([
            'username' => 'wali_kelas_5',
            'password' => Hash::make('password'),
            'role'     => 'wali_kelas',
            'kelas'    => '5',
            'no_hp'    => '081234567890',
        ]);

        $wali2 = User::create([
            'username' => 'wali_kelas_6',
            'password' => Hash::make('password'),
            'role'     => 'wali_kelas',
            'kelas'    => '6',
            'no_hp'    => '089876543210',
        ]);

        // 2️⃣ Data wali kelas
        $waliKelas1 = WaliKelas::create([
            'user_id' => $wali1->id,
            'nama' => 'Ibu Rina',
            'nip'  => '1234567890',
        ]);

        $waliKelas2 = WaliKelas::create([
            'user_id' => $wali2->id,
            'nama' => 'Bapak Dedi',
            'nip'  => '9876543210',
        ]);

        // 3️⃣ User siswa
        $siswaUsers = [];
        for ($i = 1; $i <= 5; $i++) {
            $siswaUsers[] = User::create([
                'username' => 'siswa' . $i,
                'password' => Hash::make('password'),
                'role'     => 'siswa',
                'kelas'    => $i < 4 ? '5' : '6', // 3 siswa kelas 5, 2 siswa kelas 6
                'no_hp'    => '08' . rand(1000000000, 9999999999),
            ]);
        }

        // 4️⃣ Data siswa
        $siswas = [];
        foreach ($siswaUsers as $index => $user) {
            $wali = $index < 3 ? $waliKelas1 : $waliKelas2;
            $siswas[] = Siswa::create([
                'user_id'       => $user->id,
                'wali_kelas_id' => $wali->id,
                'nama'          => 'Siswa ' . ($index + 1),
                'status'        => 'aktif',
            ]);
        }

        // 5️⃣ Transaksi tabungan
        foreach ($siswas as $siswa) {
            for ($i = 1; $i <= 3; $i++) {
                Transaksi::create([
                    'siswa_id'   => $siswa->id,
                    'tanggal'    => Carbon::now()->subDays(rand(0, 30)),
                    'jenis'      => $i % 2 === 0 ? 'tarik' : 'setor',
                    'jumlah'     => rand(5000, 50000),
                    'keterangan' => 'Transaksi ke-' . $i,
                    'dibuat_oleh' => $siswa->wali_kelas_id,
                ]);
            }
        }

        $this->command->info('🚀 Database seeding berhasil!');
    }
}
