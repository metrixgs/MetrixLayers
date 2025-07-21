<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeoController extends Controller
{
    public function getFromTable(Request $request, string $table)
    {
        $query = DB::table($table);

        // Mapas de filtros por tabla
        $filters = [
            'pais'         => [],
            'estados'      => ['level_1' => 'cve_pais'],
            'municipios'   => ['level_1' => 'cve_ent'],
            'delegaciones' => ['level_1' => 'cu_mun'],
            'colonias'     => ['level_1' => 'cu_mun'],
            'cod_postal'   => ['level_1' => 'cu_mun'],
            'manzanas'     => ['level_1' => 'cu_mun'],
            'predios'      => ['level_1' => 'cu_mun'], // AGREGADO
        ];

        // Aplica filtros si existen para la tabla
        if (isset($filters[$table])) {
            foreach ($filters[$table] as $level => $column) {
                if ($request->has($level)) {
                    $query->where($column, $request->get($level));
                }
            }
        }

        // Obtener columnas disponibles
        $columns = array_filter(
            DB::getSchemaBuilder()->getColumnListing($table),
            fn($col) => $col !== 'geom'
        );

        // Incluir columna geom si se solicita
        if ($request->boolean('with_geom', true)) {
            $columns[] = DB::raw('ST_AsGeoJSON(geom)::json AS geom');
        }

        $query->select($columns);

        // Ordenar (opcional)
        if ($request->has('sort_by')) {
            $direction = $request->get('order', 'asc');
            $query->orderBy($request->get('sort_by'), $direction);
        }

        // Paginación (opcional)
        $page = (int) $request->get('page', 1);
        $perPage = (int) $request->get('per_page', 1000);
        $results = $query->forPage($page, $perPage)->get();

        // Construir FeatureCollection
        $features = $results->map(function ($row) use ($request) {
            $props = (array) $row;
            $geometry = null;

            if ($request->boolean('with_geom', true) && isset($props['geom'])) {
                $geometry = $props['geom'];
                unset($props['geom']);
            }

            return [
                'type' => 'Feature',
                'geometry' => $geometry,
                'properties' => $props,
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features,
        ]);
    }

    // Endpoints
    public function getPaises(Request $request)       { return $this->getFromTable($request, 'pais'); }
    public function getEstados(Request $request)      { return $this->getFromTable($request, 'estados'); }
    public function getMunicipios(Request $request)   { return $this->getFromTable($request, 'municipios'); }
    public function getDelegaciones(Request $request) { return $this->getFromTable($request, 'delegaciones'); }
    public function getColonias(Request $request)     { return $this->getFromTable($request, 'colonias'); }
    public function getManzanas(Request $request)     { return $this->getFromTable($request, 'manzanas'); }
    public function getCodPostal(Request $request)    { return $this->getFromTable($request, 'cod_postal'); }
    public function getPredios(Request $request)      { return $this->getFromTable($request, 'predios'); } // AGREGADO
}
