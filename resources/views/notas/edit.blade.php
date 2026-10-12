@extends('layouts.base')

@section('titulo', 'Editar: ' . $nota->titulo)

@section('navegacion', '')

@section('contenido')
    <h1 class="mb-6 text-2xl font-semibold">Editar nota</h1>

    <form action="{{ route('notas.update', $nota) }}" method="POST"
        class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        @method('PUT')

        <x-nota-campos :nota="$nota" :categorias="$categorias" />

        <div class="mt-6 flex justify-end gap-2">
            <a href="{{ route('notas.show', $nota) }}"
                class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium hover:bg-gray-50">
                Cancelar
            </a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                Guardar cambios
            </button>
        </div>
    </form>
@endsection
