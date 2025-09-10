<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionElectoral extends Model
{
    use HasFactory;

    protected $connection = 'pgsql_trigger';
    protected $table = 'seccion_electoral';
    protected $primaryKey = 'gid';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_del',
        'nom_del',
        'distrito_f',
        'distrito_l',
        'seccion',
        'circuito',
        'distrito_f_',
        'tipo',
        'circunscri',
        'geom',
        'fid',
        'id',
        'cve_pais',
        'nom_pais',
        'cve_ent',
        'nom_ent',
        'cve_mun',
        'nom_mun',
        'cve_loc',
        'nom_loc',
        'id_secc',
    ];

    protected $casts = [
        'gid' => 'integer',
        'id_del' => 'string',
        'nom_del' => 'string',
        'distrito_f' => 'float',
        'distrito_l' => 'float',
        'seccion' => 'integer',
        'circuito' => 'float',
        'distrito_f_' => 'float',
        'tipo' => 'float',
        'circunscri' => 'string',
        'geom' => 'string',
        'fid' => 'integer',
        'id' => 'float',
        'cve_pais' => 'string',
        'nom_pais' => 'string',
        'cve_ent' => 'string',
        'nom_ent' => 'string',
        'cve_mun' => 'string',
        'nom_mun' => 'string',
        'cve_loc' => 'string',
        'nom_loc' => 'string',
        'id_secc' => 'string',
    ];
}