<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function localidadesEvento()
    {
        return $this->hasMany(localidadEvento::class);
    }
    //relación de 1 a muchos
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }
    //Relación de 1 a muchos
    public function seccionLocalidads()
    {
        return $this->hasMany(SeccionLocalidad::class);
    }
}
