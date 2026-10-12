@extends('layouts.base')

@section('titulo', 'Crear nota')

@section('navegacion', '')

@section('contenido')
    <h1 class="mb-6 text-2xl font-semibold">Nueva nota</h1>

    <form action="{{ route('notas.store') }}" method="POST"
        class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        @csrf

        <x-nota-campos :categorias="$categorias" />

        <div class="mt-6 flex justify-end gap-2">
            <a href="{{ route('notas.index') }}"
                class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium hover:bg-gray-50">
                Cancelar
            </a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                Guardar
            </button>
        </div>
    </form>
@endsection
