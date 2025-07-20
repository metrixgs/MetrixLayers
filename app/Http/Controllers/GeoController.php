<?php
 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeoController extends Controller
{
    public function getFromTable(Request $request, string $table)
    {
        $query = DB::table($table);

        // Filtrar por campos level_#
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'level_')) {
                $query->where($key, $value);
            }
        }

        // Si with_geom=true, incluir campo geom como GeoJSON
        if ($request->boolean('with_geom')) {
            $query->select('*', DB::raw('ST_AsGeoJSON(geom)::json AS geom_geojson'));
        } else {
            $query->select('*')->addSelect(DB::raw('NULL as geom_geojson'));
        }

        return response()->json($query->get());
    }

    // Métodos por tabla
    public function getPaises(Request $request)       { return $this->getFromTable($request, 'pais'); }
    public function getEstados(Request $request)      { return $this->getFromTable($request, 'estados'); }
    public function getDelegaciones(Request $request) { return $this->getFromTable($request, 'delegaciones'); }
    public function getMunicipios(Request $request)   { return $this->getFromTable($request, 'municipios'); }
    public function getManzanas(Request $request)     { return $this->getFromTable($request, 'manzanas'); }
    public function getColonias(Request $request)     { return $this->getFromTable($request, 'colonias'); }
    public function getCodPostal(Request $request)    { return $this->getFromTable($request, 'cod_postal'); }
}
