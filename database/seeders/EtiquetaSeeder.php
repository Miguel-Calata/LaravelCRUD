<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etiqueta;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = ['urgente', 'pendiente', 'idea', 'personal', 'trabajo'];

        foreach ($nombres as $nombre) {
            Etiqueta::firstOrCreate(['nombre' => $nombre]);
        }
    }
}
