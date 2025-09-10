<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeoController;
use App\Http\Controllers\DistritoFederalController;
use App\Http\Controllers\DistritoLocalController;
use App\Http\Controllers\SeccionElectoralController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

 
Route::get('/pais', [GeoController::class, 'getPaises']);
Route::get('/estados', [GeoController::class, 'getEstados']);
Route::get('/delegaciones', [GeoController::class, 'getDelegaciones']);
Route::get('/municipios', [GeoController::class, 'getMunicipios']);
Route::get('/manzanas', [GeoController::class, 'getManzanas']);
Route::get('/colonias', [GeoController::class, 'getColonias']);
Route::get('/colonias-light', [GeoController::class, 'getColoniasLight']);
Route::get('/cod_postal', [GeoController::class, 'getCodPostal']);
Route::get('/predios', [GeoController::class, 'getPredios']);
Route::get('/geo/{table}/{id}', [GeoController::class, 'getById']);
Route::get('/filtros-jerarquicos', [GeoController::class, 'filtrosJerarquicos']);

Route::get('/distritos-federales', [DistritoFederalController::class, 'index']);
Route::get('/distritos-federales/{gid}', [DistritoFederalController::class, 'show']);

Route::get('/distritos-locales', [DistritoLocalController::class, 'index']);
Route::get('/distritos-locales/{gid}', [DistritoLocalController::class, 'show']);

Route::get('/secciones-electorales', [SeccionElectoralController::class, 'index']);
Route::get('/secciones-electorales/{gid}', [SeccionElectoralController::class, 'show']);
