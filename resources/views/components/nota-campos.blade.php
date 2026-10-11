@props(['nota' => null])

<label for="titulo">Título</label><br>
<input type="text" id="titulo" name="titulo" value="{{ old('titulo', $nota?->titulo) }}"><br>
@error('titulo')
    <small style="color: red">{{ $message }}</small><br>
@enderror

<label for="contenido">Contenido</label><br>
<textarea id="contenido" name="contenido" rows="6">{{ old('contenido', $nota?->contenido) }}</textarea><br>
@error('contenido')
    <small style="color: red">{{ $message }}</small><br>
@enderror