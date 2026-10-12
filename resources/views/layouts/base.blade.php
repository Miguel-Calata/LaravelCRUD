<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Mis notas')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @section('navegacion')
            <a href="{{ route('notas.index') }}">Mis notas</a>
            <a href="{{ route('notas.papelera') }}">Papelera</a>
        @show
    </header>

    @if (session('exito'))
        <x-alerta tipo="exito">{{ session('exito') }}</x-alerta>
    @endif

    @if (session('error'))
        <x-alerta tipo="error">{{ session('error') }}</x-alerta>
    @endif

    <main>
        @yield('contenido')
    </main>
</body>

</html>
