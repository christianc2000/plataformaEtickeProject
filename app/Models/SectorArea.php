<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorArea extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //relación inversa de 1 a muchos inversa
    public function sector(){
       return $this->belongsTo(SeccionLocalidad::class);
    }
    //relación inversa de 1 a muchos inversa
    public function area(){
        return $this->belongsTo(area::class);
    }
    //relación inversa de 1 a muchos inversa
    public function localidadEvento(){
        return $this->belongsTo(localidadEvento::class);
    }
}
