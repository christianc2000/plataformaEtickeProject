<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'deleted_at','created_at', 'updated_at'];
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
