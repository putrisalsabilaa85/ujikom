<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(PetugasSeeder::class);

       Kelas::create([
        'nama_kelas' => 'XII',
        'kompetensi_keahlian' => 'RPL',
       ]);
    }
}
