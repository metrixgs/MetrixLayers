<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistritoFederal extends Model
{
    use HasFactory;

    protected $connection = 'pgsql_trigger'; // Usar la nueva conexión
    protected $table = 'distrito_federal'; // Nombre de la tabla
    protected $primaryKey = 'gid'; // Clave primaria
    public $incrementing = true; // La clave primaria es auto-incremental
    public $timestamps = false; // No usar timestamps created_at y updated_at

    protected $fillable = [
        'id',
        'fid',
        'cve_pais',
        'circunscri',
        'cve_ent',
        'cve_df',
        'tipo',
        'geom',
    ];

    protected $casts = [
        'gid' => 'integer',
        'id' => 'float',
        'fid' => 'float',
        'cve_pais' => 'string',
        'circunscri' => 'float',
        'cve_ent' => 'string',
        'cve_df' => 'float',
        'tipo' => 'float',
        'geom' => 'string',
          
    ];
}