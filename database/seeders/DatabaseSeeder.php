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
        // Data wali kelas
        $dataWali = [
            1 => ['nama' => 'Ibu Sari',   'nip' => '1111111111', 'no_hp' => '081111111111'],
            2 => ['nama' => 'Ibu Lina',   'nip' => '2222222222', 'no_hp' => '082222222222'],
            3 => ['nama' => 'Bapak Andi', 'nip' => '3333333333', 'no_hp' => '083333333333'],
            4 => ['nama' => 'Bapak Rudi', 'nip' => '4444444444', 'no_hp' => '084444444444'],
            5 => ['nama' => 'Ibu Rina',   'nip' => '5555555555', 'no_hp' => '085555555555'],
            6 => ['nama' => 'Bapak Dedi', 'nip' => '6666666666', 'no_hp' => '086666666666'],
        ];

        foreach ($dataWali as $kelas => $wali) {

            // 1️⃣ User wali kelas
            $user = User::create([
                'username' => 'wali_kelas_' . $kelas,
                'password' => Hash::make('password'),
                'role'     => 'wali_kelas',
                'kelas'    => $kelas,
                'no_hp'    => $wali['no_hp'],
            ]);

            // 2️⃣ Data wali kelas
            WaliKelas::create([
                'user_id' => $user->id,
                'nama'    => $wali['nama'],
                'nip'     => $wali['nip'],
            ]);
        }

        $this->command->info('🚀 Database seeding berhasil!');
    }
}
