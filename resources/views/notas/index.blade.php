@extends('layouts.base')

@section('titulo', 'Mis notas')

@section('contenido')
    <h1>Mis notas</h1>

    <a href="{{ route('notas.create') }}">+ Nueva nota</a>

    @foreach ($notas as $nota)
        <h2><a href="{{ route('notas.show', $nota) }}">{{ $nota->titulo }}</a></h2>
        <p>{{ $nota->contenido }}</p>
        <small>{{ $nota->created_at->format('d/m/Y H:i') }}</small>
    @endforeach
@endsection