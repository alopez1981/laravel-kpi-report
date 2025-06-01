<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filtros = $request->only(['autoescuela', 'anio']);
        $datos = [];

        if ($request->has('autoescuela')) {
            $datos = DB::table('theory_tests_method')
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

        return view('reports.index', compact('datos', 'filtros'));
    }

    public function export(Request $request)
    {
        $filtros = $request->only(['autoescuela', 'anio']);

        $datos = DB::table('theory_tests_method')
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

        $pdf = Pdf::loadView('reports.pdf', compact('datos', 'filtros'));
        return $pdf->download('seguimiento_metodo.pdf');
    }
}

