<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegacion extends Model
{
    use HasFactory;
     protected $table = 'delegaciones';
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id');
    }
}
