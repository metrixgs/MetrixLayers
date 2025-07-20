<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodPostal extends Model
{
    use HasFactory;
      protected $table = 'cod_postal';
    public $timestamps = false;

    public function colonia()
    {
        return $this->belongsTo(Colonia::class, 'id_colonia', 'id');
    }
}
