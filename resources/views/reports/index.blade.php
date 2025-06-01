@php use Carbon\Carbon; @endphp

<h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Informe: Seguimiento del Método</h1>

<form method="GET" action="/reportes" style="margin-bottom: 20px;">
    <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: flex-end;">
        <div>
            <label for="autoescuela">Autoescuela:</label><br>
            <select name="autoescuela" id="autoescuela">
                <option value="">-- Todas --</option>
                @foreach($autoescuelas as $nombre)
                    <option value="{{ $nombre }}" {{ request('autoescuela') == $nombre ? 'selected' : '' }}>
                        {{ ucfirst($nombre) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="mes">Mes:</label><br>
            <select name="mes" id="mes">
                <option value="">-- Todos --</option>
                @for ($i = 1; $i <= 12; $i++)
                    @php
                        $mesNombre = Carbon::create()->month($i)->locale('es')->translatedFormat('F');
                    @endphp
                    <option value="{{ $i }}" {{ request('mes') == $i ? 'selected' : '' }}>
                        {{ ucfirst($mesNombre) }}
                    </option>
                @endfor
            </select>
        </div>

        <div>
            <label for="anio">Año:</label><br>
            <input type="number" name="anio" id="anio" value="{{ request('anio', date('Y')) }}">
        </div>

        <div>
            <button type="submit" style="padding: 6px 12px;">Buscar</button>
        </div>
    </div>
</form>

@if (!empty($datos) && count($datos))
    <table border="1" cellpadding="6" cellspacing="0" style="margin-top: 20px; border-collapse: collapse;">
        <thead style="background-color: #f0f0f0;">
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
                <td>{{ ucfirst(Carbon::create()->month($fila->mes)->locale('es')->translatedFormat('F')) }}</td>
                <td>{{ $fila->porcentaje }}%</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <form method="POST" action="{{ route('reportes.export') }}" style="margin-top: 20px;">
        @csrf
        <input type="hidden" name="autoescuela" value="{{ request('autoescuela') }}">
        <input type="hidden" name="anio" value="{{ request('anio') }}">
        <input type="hidden" name="mes" value="{{ request('mes') }}">
        <button type="submit" style="padding: 6px 12px;">Exportar PDF</button>
    </form>
@endif
