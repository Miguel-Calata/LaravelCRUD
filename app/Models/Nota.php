<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
    use SoftDeletes;

    protected $table = 'notas';

    protected $fillable = [
        'titulo',
        'contenido',
        'fijada',
    ];

    protected function cast(): array
    {
        return [
            'fijada' => 'boolean',
        ];
    }

}
