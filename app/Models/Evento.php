<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // relación de 1 a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    //relación 1 a muchos
    public function localidadesEvento()
    {
        return $this->hasMany(localidadEvento::class);
    }
    
}
