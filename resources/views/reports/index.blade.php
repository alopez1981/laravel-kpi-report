<h1>Informe: Seguimiento del Método</h1>

<form method="GET" action="/reportes">
    <label>Autoescuela:</label>
    <input type="text" name="autoescuela" value="{{ request('autoescuela') }}">

    <label>Año:</label>
    <input type="number" name="anio" value="{{ request('anio', date('Y')) }}">

    <button type="submit">Buscar</button>
</form>

@if (!empty($datos))
    <table border="1" cellpadding="5" cellspacing="0" style="margin-top: 20px;">
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
                <td>{{ $fila->driving_school_name }}</td>
                <td>{{ $fila->anio }}</td>
                <td>{{ $fila->mes }}</td>
                <td>{{ $fila->porcentaje }}%</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Botón Exportar PDF --}}
    <form method="POST" action="{{ route('reportes.export') }}" style="margin-top: 15px;">
        @csrf
        <input type="hidden" name="autoescuela" value="{{ request('autoescuela') }}">
        <input type="hidden" name="anio" value="{{ request('anio') }}">
        <button type="submit">Exportar PDF</button>
    </form>
@endif
