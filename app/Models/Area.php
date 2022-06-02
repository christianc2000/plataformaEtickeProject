<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //relación de 1 a muchos inversa
    public function seccionLocalidad()
    {
        return $this->belongsTo(seccionLocalidad::class);
    }
    //relación de 1 a muchos inversa
    public function localidadEventos()
    {
        return $this->belongsTo(localidadEvento::class);
    }
}
