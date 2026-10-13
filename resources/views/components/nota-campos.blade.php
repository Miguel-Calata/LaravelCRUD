@props(['nota' => null, 'categorias', 'etiquetas'])


@php
    $seleccionadas = old('etiquetas', $nota?->etiquetas->pluck('id')->all() ?? []);
@endphp

<div class="space-y-5">
    <div class="space-y-1">
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $nota?->titulo) }}"
            class="w-full rounded-md border px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none @error('titulo') border-red-500 @else border-gray-300 @enderror">
        @error('titulo')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-1">
        <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
        <select id="categoria_id" name="categoria_id"
            class="w-full rounded-md border bg-white px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none @error('categoria_id') border-red-500 @else border-gray-300 @enderror">
            <option value="">Sin categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @selected(old('categoria_id', $nota?->categoria_id) == $categoria->id)>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <fieldset class="space-y-1">
        <legend class="block text-sm font-medium text-gray-700">Etiquetas</legend>
        <div class="flex flex-wrap gap-3">
            @foreach ($etiquetas as $etiqueta)
                <label class="inline-flex items-center gap-1 text-sm text-gray-700">
                    <input type="checkbox" name="etiquetas[]" value="{{ $etiqueta->id }}"
                        class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-200"
                        @checked(in_array($etiqueta->id, $seleccionadas))>
                    {{ $etiqueta->nombre }}
                </label>
            @endforeach
        </div>
        @error('etiquetas')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
        @error('etiquetas.*')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </fieldset>

    <div class="space-y-1">
        <label for="contenido" class="block text-sm font-medium text-gray-700">Contenido</label>
        <textarea id="contenido" name="contenido" rows="6"
            class="w-full rounded-md border px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none @error('contenido') border-red-500 @else border-gray-300 @enderror">{{ old('contenido', $nota?->contenido) }}</textarea>
        @error('contenido')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
