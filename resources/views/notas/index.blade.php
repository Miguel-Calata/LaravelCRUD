@extends('layouts.base')

@section('titulo', 'Mis notas')

@section('contenido')
    <div class="mb-6 flex items-center justify-between gap-4">
        <h1 class="text-2xl font-semibold">Mis notas</h1>
        <a href="{{ route('notas.create') }}"
            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
            + Nueva nota
        </a>
    </div>

    <form action="{{ route('notas.index') }}" method="GET" class="mb-6 flex items-center gap-2">
        <input type="search" name="buscar" value="{{ $buscar }}" placeholder="Buscar notas..."
            class="min-w-0 flex-1 rounded-md border border-gray-300 bg-white px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none">
        <button type="submit"
            class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium hover:bg-gray-50">
            Buscar
        </button>
        @if ($buscar)
            <a href="{{ route('notas.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Limpiar</a>
        @endif
    </form>

    <div class="space-y-4">
        @forelse ($notas as $nota)
            <article
                class="rounded-lg border bg-white p-4 shadow-sm {{ $nota->fijada ? 'border-yellow-300' : 'border-gray-200' }}">
                <h2 class="text-lg font-semibold">
                    @if ($nota->fijada)
                        <span title="Fijada">📌</span>
                    @endif
                    <a href="{{ route('notas.show', $nota) }}" class="hover:text-indigo-600">{{ $nota->titulo }}</a>
                </h2>

                <p class="mt-1 line-clamp-3 text-gray-600">{{ $nota->contenido }}</p>

                <div class="mt-3 flex flex-wrap items-center gap-2 text-sm">
                    <span class="text-gray-500">{{ $nota->created_at->format('d/m/Y H:i') }}</span>

                    @if ($nota->categoria)
                        <a href="{{ route('notas.categoria', $nota->categoria) }}"
                            class="rounded bg-indigo-50 px-2 py-0.5 text-xs text-indigo-700 hover:bg-indigo-100">
                            {{ $nota->categoria->nombre }}
                        </a>
                    @else
                        <a href="{{ route('notas.categoria') }}"
                            class="rounded bg-gray-100 px-2 py-0.5 text-xs text-gray-500 hover:bg-gray-200">
                            Sin categoría
                        </a>
                    @endif

                    @foreach ($nota->etiquetas as $etiqueta)
                        <span class="rounded bg-gray-100 px-2 py-0.5 text-xs text-gray-600">#{{ $etiqueta->nombre }}</span>
                    @endforeach

                    <form action="{{ route('notas.fijar', $nota) }}" method="POST" class="ml-auto">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="fijada" value="{{ $nota->fijada ? 0 : 1 }}">
                        <button type="submit"
                            class="rounded-md border border-gray-300 bg-white px-3 py-1 text-xs font-medium hover:bg-gray-50">
                            {{ $nota->fijada ? 'Desfijar' : 'Fijar' }}
                        </button>
                    </form>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-dashed border-gray-300 py-12 text-center text-gray-500">
                No hay notas disponibles.
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $notas->links() }}
    </div>
@endsection
