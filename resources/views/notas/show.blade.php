@extends('layouts.base')

@section('titulo', $nota->titulo)

@section('contenido')
    <a href="{{ route('notas.index') }}" class="mb-4 inline-block text-sm text-gray-500 hover:text-gray-700">← Volver</a>

    <article class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold">
            @if ($nota->fijada)
                <span title="Fijada">📌</span>
            @endif
            {{ $nota->titulo }}
        </h1>

        <div class="mt-2 flex flex-wrap items-center gap-2 text-sm">
            <span class="text-gray-500">{{ $nota->created_at->format('d/m/Y H:i') }}</span>
            <span class="rounded bg-indigo-50 px-2 py-0.5 text-xs text-indigo-700">
                {{ $nota->categoria?->nombre ?? 'Sin categoría' }}
            </span>
            @foreach ($nota->etiquetas as $etiqueta)
                <span class="rounded bg-gray-100 px-2 py-0.5 text-xs text-gray-600">#{{ $etiqueta->nombre }}</span>
            @endforeach
        </div>

        <p class="mt-6 whitespace-pre-line text-gray-700">{{ $nota->contenido }}</p>

        <div class="mt-6 flex justify-end gap-2 border-t border-gray-100 pt-4">
            <a href="{{ route('notas.edit', $nota) }}"
                class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium hover:bg-gray-50">
                Editar
            </a>
            <form action="{{ route('notas.destroy', $nota) }}" method="POST"
                onsubmit="return confirm('¿Seguro que quieres borrar esta nota?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                    Borrar
                </button>
            </form>
        </div>
    </article>
@endsection
