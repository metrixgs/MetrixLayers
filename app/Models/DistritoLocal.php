<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistritoLocal extends Model
{
    use HasFactory;

    protected $connection = 'pgsql_trigger'; 
    protected $table = 'distrito_local'; 
    protected $primaryKey = 'gid'; 
    public $incrementing = true; 
    public $timestamps = false; 

    protected $fillable = [
        'id',
        'fid',
        'cve_pais',
        'circunscri',
        'cve_ent',
        'cve_dl',
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
        'cve_dl' => 'float',
        'cve_df' => 'float',
        'tipo' => 'float',
        'geom' => 'string', 
    ];
}