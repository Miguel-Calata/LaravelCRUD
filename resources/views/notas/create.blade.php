@extends('layouts.base')

@section('titulo', 'Crear nota')

@section('navegacion', '')

@section('contenido')
    <h1>Nueva nota</h1>

    <form action="{{ route('notas.store') }}" method="POST">
        @csrf

        <x-nota-campos :categorias="$categorias" />

        <button type="submit">Guardar</button>
    </form>
@endsection
