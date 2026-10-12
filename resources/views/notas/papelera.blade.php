@extends('layouts.base')

@section('titulo', 'Papelera')

@section('contenido')
    <h1 class="mb-6 text-2xl font-semibold">Papelera</h1>

    <div class="space-y-4">
        @forelse ($notas as $nota)
            <article class="rounded-lg border border-gray-200 bg-white p-4 opacity-75 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700">{{ $nota->titulo }}</h2>
                <p class="mt-1 line-clamp-2 text-gray-500">{{ $nota->contenido }}</p>

                <div class="mt-3 flex items-center justify-between gap-2 text-sm">
                    <span class="text-gray-500">Borrada el {{ $nota->deleted_at->format('d/m/Y H:i') }}</span>
                    <form action="{{ route('notas.restaurar', $nota) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="rounded-md border border-gray-300 bg-white px-3 py-1 text-xs font-medium hover:bg-gray-50">
                            Restaurar
                        </button>
                    </form>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-dashed border-gray-300 py-12 text-center text-gray-500">
                La papelera está vacía.
            </div>
        @endforelse
    </div>
@endsection
