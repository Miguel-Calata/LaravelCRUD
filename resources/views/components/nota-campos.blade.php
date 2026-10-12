@props(['nota' => null, 'categorias'])

<label for="titulo">Título</label><br>
<input type="text" id="titulo" name="titulo" value="{{ old('titulo', $nota?->titulo) }}"><br>
@error('titulo')
    <small style="color: red">{{ $message }}</small><br>
@enderror

<label for="categoria_id">Categoría</label><br>
<select id="categoria_id" name="categoria_id">
    <option value="">Sin categoría</option>
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}"
            @selected(old('categoria_id', $nota?->categoria_id) == $categoria->id)>
            {{ $categoria->nombre }}
        </option>
    @endforeach
</select><br>
@error('categoria_id')
    <small style="color: red">{{ $message }}</small><br>
@enderror

<label for="contenido">Contenido</label><br>
<textarea id="contenido" name="contenido" rows="6">{{ old('contenido', $nota?->contenido) }}</textarea><br>
@error('contenido')
    <small style="color: red">{{ $message }}</small><br>
@enderror