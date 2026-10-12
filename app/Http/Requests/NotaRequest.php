<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;  

class NotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255|unique:notas,titulo,' . $this->route('nota')?->id,
            'contenido' => 'required|string',
            'categoria_id' => 'nullable|integer|exists:categorias,id',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede pasar de :max caracteres.',
            'contenido.required' => 'El contenido es obligatorio.',
            'titulo.unique' => 'El título ya existe. Por favor, elige otro. (revisa también la papelera)',
        ];
    }
}
