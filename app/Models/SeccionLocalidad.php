<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionLocalidad extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
//relación de 1 a muchos inversa
    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
    // relación de 1 a muchos
    public function sectorAreas(){
        return $this->hasMany(sectorAreas::class);
    }
  
}
