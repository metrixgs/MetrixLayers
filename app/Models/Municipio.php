<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios';
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id');
    }

    public function manzanas()
    {
        return $this->hasMany(Manzana::class, 'id_municipio', 'id');
    }
}
