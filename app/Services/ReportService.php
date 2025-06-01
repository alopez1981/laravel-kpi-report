<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ReportService
{
    public function getSeguimientoMetodo(array $filtros)
    {
        return DB::table('theory_tests_method')
            ->selectRaw('driving_school_name, MONTH(test_date) as mes, YEAR(test_date) as anio, ROUND(AVG(complies_with_method) * 100, 2) as porcentaje')
            ->where('test_type', 'common')
            ->where('course_attendances', 4)
            ->whereRaw("JSON_EXTRACT(test_completed, '$.total') >= 133")
            ->where('points', '>=', 50000)
            ->where('theory_test_convocatory_number', 1)
            ->when($filtros['autoescuela'], fn($q) => $q->where('driving_school_name', $filtros['autoescuela']))
            ->when($filtros['anio'], fn($q) => $q->whereYear('test_date', $filtros['anio']))
            ->groupBy('driving_school_name', 'anio', 'mes')
            ->orderBy('anio')
            ->orderBy('mes')
            ->get();
    }
}
