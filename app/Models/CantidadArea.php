<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CantidadArea extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function areaP(){
        return $this->belongsTo(Area::class,'id','areaP_id');
    }
    public function areaH(){
        return $this->belongsTo(Area::class,'id','areaH_id');
    }
    public function fecha(){
        return $this->belongsTo(Fecha::class);
    }
}
