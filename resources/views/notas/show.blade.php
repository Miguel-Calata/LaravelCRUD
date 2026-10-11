@extends('layouts.base')

@section('titulo', $nota->titulo)

@section('contenido')
    <h1>{{ $nota->titulo }}</h1>
    <a href="{{ route('notas.edit', $nota) }}">Editar</a>

    <p>{{ $nota->contenido }}</p>

    <small>{{ $nota->created_at->format('d/m/Y H:i') }}</small>

    <form action="{{ route('notas.destroy', $nota) }}" method="POST"
        onsubmit="return confirm('¿Seguro que quieres borrar esta nota?')">
        @csrf
        @method('DELETE')
        <button type="submit">Borrar</button>
    </form>
@endsection
