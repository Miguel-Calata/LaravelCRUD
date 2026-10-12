@props(['tipo' => 'exito'])

<div {{ $attributes->class([
    'mb-6 rounded-md border px-4 py-3 text-sm',
    'border-red-200 bg-red-50 text-red-800' => $tipo === 'error',
    'border-green-200 bg-green-50 text-green-800' => $tipo !== 'error',
]) }}>
    {{ $slot }}
</div>
