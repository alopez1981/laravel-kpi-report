<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe PDF - Seguimiento del Método</title>
    <style>
        {!! file_get_contents(resource_path('views/reports/pdf.css')) !!}
    </style>

</head>
<body>

<header>
    <img src="{{ public_path('images/logo.png') }}" alt="Hoy-voy">
    <div>
        <h1>Informe de Seguimiento del Método</h1>
        <div class="meta">
            Autoescuela: <strong>{{ $filtros['autoescuela'] ?? 'Todas' }}</strong> &nbsp;|&nbsp;
            Año: <strong>{{ $filtros['anio'] ?? 'Todos' }}</strong>
        </div>
    </div>
</header>

<table>
    <thead>
    <tr>
        <th>Centro</th>
        <th>Año</th>
        <th>Mes</th>
        <th>% Seguimiento</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($datos as $fila)
        <tr>
            <td>{{ ucfirst($fila->driving_school_name) }}</td>
            <td>{{ $fila->anio }}</td>
            <td>{{ str_pad($fila->mes, 2, '0', STR_PAD_LEFT) }}</td>
            <td>{{ number_format($fila->porcentaje, 2) }}%</td>
        </tr>
    @endforeach
    </tbody>
</table>

<footer>
    Generado el {{ now()->format('d/m/Y H:i') }}
</footer>

</body>
</html>
