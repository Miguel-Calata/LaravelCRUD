<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected function casts(): array
    {
        return [
            'fijada' => 'boolean',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class);
    }
}
