<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //Relación inversa de 1 a muchos
    public function localidadEvento(){
        return $this->belongsTo(localidadEvento::class);
    }
    
}   
