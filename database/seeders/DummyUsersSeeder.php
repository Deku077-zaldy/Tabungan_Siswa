<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DummyUsersSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();

        $users = [
            ['username' => 'wali_kelas_5a', 'password' => Hash::make('password'), 'role' => 'wali_kelas', 'created_at'=>$now,'updated_at'=>$now],
            ['username' => 'wali_kelas_6a', 'password' => Hash::make('password'), 'role' => 'wali_kelas', 'created_at'=>$now,'updated_at'=>$now],
            ['username' => 'siswa1', 'password' => Hash::make('password'), 'role' => 'siswa', 'created_at'=>$now,'updated_at'=>$now],
            ['username' => 'siswa2', 'password' => Hash::make('password'), 'role' => 'siswa', 'created_at'=>$now,'updated_at'=>$now],
            ['username' => 'siswa3', 'password' => Hash::make('password'), 'role' => 'siswa', 'created_at'=>$now,'updated_at'=>$now],
            ['username' => 'siswa4', 'password' => Hash::make('password'), 'role' => 'siswa', 'created_at'=>$now,'updated_at'=>$now],
            ['username' => 'siswa5', 'password' => Hash::make('password'), 'role' => 'siswa', 'created_at'=>$now,'updated_at'=>$now],
        ];

        foreach ($users as $u) {
            // updateOrInsert agar aman ketika dijalankan ulang
            DB::table('users')->updateOrInsert(
                ['username' => $u['username']],
                ['password' => $u['password'], 'role' => $u['role'], 'created_at' => $u['created_at'], 'updated_at' => $u['updated_at']]
            );
        }

        $this->command->info('✅ Dummy users inserted/updated');
    }
}
