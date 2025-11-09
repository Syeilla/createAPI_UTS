<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = Mahasiswa::factory()->count(10)->create()->toArray();
        Storage::put('mahasiswa.json', json_encode($items, JSON_PRETTY_PRINT));
    }
}
