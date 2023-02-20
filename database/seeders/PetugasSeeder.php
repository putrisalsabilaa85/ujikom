<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Petugas::truncate();
        Petugas::create([
            'nama_petugas' => 'Admin Aplikasi',
            'level' => 'admin',
            'username' => 'adminspp',
            'password' => bcrypt('admin888'),
            // 'remember_token' => Str::random(60),
        ]);
    }
}
