@extends('layouts.base')

@section('titulo', 'Mis notas')

@section('contenido')
    <h1>Mis notas</h1>

    <a href="{{ route('notas.create') }}">+ Nueva nota</a>

    @foreach ($notas as $nota)
        <h2><a href="{{ route('notas.show', $nota) }}">{{ $nota->titulo }}</a></h2>
        <p>{{ $nota->contenido }}</p>
        <small>{{ $nota->created_at->format('d/m/Y H:i') }}</small>

        <form action="{{ route('notas.fijar', $nota) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <input type="hidden" name="fijada" value="{{ $nota->fijada ? 0 : 1 }}">
            <button type="submit" class="btn btn-sm {{ $nota->fijada ? 'btn-warning' : 'btn-outline-warning' }}">
                {{ $nota->fijada ? 'Desfijar' : 'Fijar' }}
            </button>
        </form>
    @endforeach

@endsection
