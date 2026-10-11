@props(['tipo' => 'exito'])

<div style="color: {{ $tipo === 'error' ? 'red' : 'green' }}; border: 1px solid; padding: 8px; margin: 8px 0;">
    {{ $slot }}
</div>