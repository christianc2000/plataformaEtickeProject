<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //Relación de 1 a muchos
    public function eventos(){
        return $this->hasMany(Evento::class);
    }
}
