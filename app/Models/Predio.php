<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    protected $table = 'predios';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'cp_prop' => 'double',
        'telefono_p' => 'double',
        'geom' => 'array', // Si usas ST_AsGeoJSON
    ];

    protected $fillable = [
        'cve_cat',
        'cve_pais',
        'cve_ent',
        'cu_mun',
        'id_del',
        'ed_col',
        'cu_mza',
        'calle',
        'num_ext',
        'no_int',
        'letra',
        'colonia',
        'sector',
        'distrito_f',
        'distrito_l',
        'seccion',
        'circuito',
        'distrito_j',
        'estatus',
        'direccion',
        'propietario',
        'num_int',
        'cp_prop',
        'telefono_p',
        'rcf_prop',
        'tipo_perso',
        'geom',
    ];

    // Relaciones

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'cu_mun', 'cu_mun');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'cve_ent', 'cve_ent');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'cve_pais', 'cve_pais');
    }

    public function manzana()
    {
        return $this->belongsTo(Manzana::class, 'cu_mza', 'cu_mza');
    }
}
