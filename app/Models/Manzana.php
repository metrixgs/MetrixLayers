<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    use HasFactory;
     protected $table = 'manzanas';
    public $timestamps = false;

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }
}
