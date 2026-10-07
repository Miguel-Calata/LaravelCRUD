<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nueva nota</title>
</head>

<body>
    <h1>Nueva nota</h1>

    <form action="{{ route('notas.store') }}" method="POST">
        @csrf

        <label for="titulo">Título</label><br>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}"><br>
        @error('titulo')
            <small style="color: red">{{ $message }}</small><br>
        @enderror

        <label for="contenido">Contenido</label><br>
        <textarea id="contenido" name="contenido" rows="6">{{ old('contenido') }}</textarea><br>
        @error('contenido')
            <small style="color: red">{{ $message }}</small><br>
        @enderror

        <button type="submit">Guardar</button>
    </form>
</body>

</html>
