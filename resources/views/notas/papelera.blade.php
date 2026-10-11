@extends('layouts.base')

@section('titulo', 'Papelera')

@section('contenido')
    <h1>Papelera</h1>

    @forelse ($notas as $nota)
        <h2>{{ $nota->titulo }}</h2>
        <p>{{ $nota->contenido }}</p>
        <small>Borrada el {{ $nota->deleted_at->format('d/m/Y H:i') }}</small>

        <form action="{{ route('notas.restaurar', $nota) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit">Restaurar</button>
        </form>
    @empty
        <p>La papelera está vacía.</p>
    @endforelse
@endsection