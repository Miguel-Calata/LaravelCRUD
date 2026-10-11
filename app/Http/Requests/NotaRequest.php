<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule; // Se usara para crear reglas de validación personalizadas... luego
use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede pasar de :max caracteres.',
            'contenido.required' => 'El contenido es obligatorio.',
        ];
    }
}
