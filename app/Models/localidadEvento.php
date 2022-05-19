<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localidadEvento extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //relación inversa de uno a muchos
    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
