<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    use HasFactory;
    protected $table = 'colonias';
    public $timestamps = false;

    public function delegacion()
    {
        return $this->belongsTo(Delegacion::class, 'id_delegacion', 'id');
    }
}
