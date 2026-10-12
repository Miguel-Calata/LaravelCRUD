@extends('layouts.base')

@section('titulo', 'Mis notas')

@section('contenido')
    <h1>Mis notas</h1>

    <a href="{{ route('notas.create') }}">+ Nueva nota</a>

    <form action="{{ route('notas.index') }}" method="GET">
        <input type="search" name="buscar" value="{{ $buscar }}" placeholder="Buscar notas...">
        <button type="submit">Buscar</button>
        @if ($buscar)
            <a href="{{ route('notas.index') }}">Limpiar</a>
        @endif
    </form>

    @forelse ($notas as $nota)
        <h2><a href="{{ route('notas.show', $nota) }}">{{ $nota->titulo }}</a></h2>
        <p>{{ $nota->contenido }}</p>
        <small>{{ $nota->created_at->format('d/m/Y H:i') }}</small>

        @if ($nota->categoria)
            <a href="{{ route('notas.categoria', $nota->categoria) }}">{{ $nota->categoria->nombre }}</a>
        @else
            <a href="{{ route('notas.categoria') }}">Sin categoría</a>
        @endif

        @foreach ($nota->etiquetas as $etiqueta)
            <span class="text-xs px-2 py-0.5 rounded bg-gray-200">#{{ $etiqueta->nombre }}</span>
        @endforeach

        <form action="{{ route('notas.fijar', $nota) }}" method="POST" class="inline">
            @csrf
            @method('PATCH')
            <input type="hidden" name="fijada" value="{{ $nota->fijada ? 0 : 1 }}">
            <button type="submit"
                class="text-sm px-2 py-1 rounded {{ $nota->fijada ? 'bg-yellow-400' : 'border border-yellow-400' }}">
                {{ $nota->fijada ? 'Desfijar' : 'Fijar' }}
            </button>
        </form>
    @empty
        <p>No hay notas disponibles.</p>
    @endforelse

    {{ $notas->links() }}
@endsection
