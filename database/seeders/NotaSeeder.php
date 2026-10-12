<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Nota;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        $notas = [
            [
                'titulo'    => 'Entregar proyecto Laravel',
                'contenido' => 'CRUD de notas con categorías y etiquetas.',
                'categoria' => 'Escuela',
                'etiquetas' => ['urgente', 'pendiente'],
            ],
            [
                'titulo'    => 'App para organizar recetas',
                'contenido' => 'Podría reutilizar el CRUD de notas.',
                'categoria' => null,
                'etiquetas' => ['idea'],
            ],
            [
                'titulo'    => 'Comprar despensa',
                'contenido' => 'Leche, huevos, café.',
                'categoria' => null,
                'etiquetas' => ['personal', 'pendiente'],
            ],
        ];

        foreach ($notas as $datos) {
            $nota = Nota::create([
                'titulo'       => $datos['titulo'],
                'contenido'    => $datos['contenido'],
                'categoria_id' => Categoria::where('nombre', $datos['categoria'])->value('id'),
            ]);

            $ids = Etiqueta::whereIn('nombre', $datos['etiquetas'])->pluck('id');
            $nota->etiquetas()->attach($ids);
        }
    }
}