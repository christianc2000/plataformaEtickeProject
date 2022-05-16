<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
   //protected $fillable=['url'];
   //relación polimorfica
    public function imageable()
    {
        return $this->morphTo();
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
    
}
