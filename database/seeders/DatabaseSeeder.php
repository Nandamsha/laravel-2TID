<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Prodi::create(['nama_prodi' => 'Teknik Informatika']);
        Prodi::create(['nama_prodi' => 'Sistem Informasi']);
        Prodi::create(['nama_prodi' => 'Teknik Rekayasa Komputer']);
        Prodi::create(['nama_prodi' => 'Tekink Listrik']);
        Prodi::create(['nama_prodi' => 'Teknik Mesin']);
    }
}
