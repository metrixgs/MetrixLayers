<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
     protected $table = 'estados';
    public $timestamps = false;

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id');
    }

    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'id_estado', 'id');
    }

    public function delegaciones()
    {
        return $this->hasMany(Delegacion::class, 'id_estado', 'id');
    }
}
