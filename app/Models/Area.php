<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
     // relación de 1 a muchos
     public function sectorAreas(){
        return $this->hasMany(sectorAreas::class);
    }
    //relación de 1 a muchos
    public function cantidadAreasP(){
        return $this->hasMany(cantidadArea::class, 'areaP_id');
    }
    //relación de 1 a muchos
    public function cantidadAreasH(){
        return $this->hasMany(cantidadArea::class, 'areaH_id');
    }
}
