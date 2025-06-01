<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reportes', [ReportController::class, 'index']);
Route::post('/reportes/exportar', [ReportController::class, 'export'])->name('reportes.export');
