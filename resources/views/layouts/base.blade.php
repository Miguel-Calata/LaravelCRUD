<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Mis notas')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 antialiased">
    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-3xl flex-wrap items-center justify-between gap-2 px-4 py-4">
            <a href="{{ route('notas.index') }}" class="text-lg font-semibold">📝 Mis notas</a>

            <nav class="flex items-center gap-4 text-sm text-gray-600">
                @section('navegacion')
                    <a href="{{ route('notas.index') }}"
                        class="hover:text-indigo-600 {{ request()->routeIs('notas.index') ? 'font-medium text-indigo-600' : '' }}">
                        Notas
                    </a>
                    <a href="{{ route('notas.papelera') }}"
                        class="hover:text-indigo-600 {{ request()->routeIs('notas.papelera') ? 'font-medium text-indigo-600' : '' }}">
                        Papelera
                    </a>
                @show

                @auth
                    <span class="text-gray-500">Hola, {{ auth()->user()->name }}</span>
                @else
                    <span class="text-gray-400">Modo invitado</span>
                @endauth
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-3xl px-4 py-8">
        @if (session('exito'))
            <x-alerta tipo="exito">{{ session('exito') }}</x-alerta>
        @endif

        @if (session('error'))
            <x-alerta tipo="error">{{ session('error') }}</x-alerta>
        @endif

        @yield('contenido')
    </main>
</body>

</html>
