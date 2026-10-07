<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis notas</title>
</head>
<body>
    <h1>Mis notas</h1>

    <a href="{{ route('notas.create') }}">+ Nueva nota</a>

    @foreach ($notas as $nota)
        <h2><a href="{{ route('notas.show', $nota) }}">{{ $nota->titulo }}</a></h2>
        <p>{{ $nota->contenido }}</p>
        <small>{{ $nota->created_at->format('d/m/Y H:i') }}</small>
    @endforeach
</body>
</html>