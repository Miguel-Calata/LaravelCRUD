@extends('layouts.base')

@section('titulo', 'Editar: ' . $nota->titulo)

@section('navegacion', '')


@section('contenido')

    <a href="{{ route('notas.show', $nota) }}">← Cancelar</a>

    <h1>Editar nota</h1>

    <form action="{{ route('notas.update', $nota) }}" method="POST">
        @csrf
        @method('PUT')

        <x-nota-campos :nota="$nota" />

        <button type="submit">Guardar cambios</button>
    </form>

@endsection
