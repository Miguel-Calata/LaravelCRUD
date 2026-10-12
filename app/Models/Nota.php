<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nota extends Model
{
    use SoftDeletes;

    protected $table = 'notas';

    protected $fillable = [
        'titulo',
        'contenido',
        'fijada',
        'categoria_id',
    ];

    protected function cast(): array
    {
        return [
            'fijada' => 'boolean',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
