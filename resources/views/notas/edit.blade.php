<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar: {{ $nota->titulo }}</title>
</head>
<body>
    <a href="{{ route('notas.show', $nota) }}">← Cancelar</a>

    <h1>Editar nota</h1>

    <form action="{{ route('notas.update', $nota) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="titulo">Título</label><br>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $nota->titulo) }}"><br>
        @error('titulo')
            <small style="color: red">{{ $message }}</small><br>
        @enderror

        <label for="contenido">Contenido</label><br>
        <textarea id="contenido" name="contenido" rows="6">{{ old('contenido', $nota->contenido) }}</textarea><br>
        @error('contenido')
            <small style="color: red">{{ $message }}</small><br>
        @enderror

        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>