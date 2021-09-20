<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const VALUE  = 1;
    const PERCENT  = 2;

    // Relacion uno a muchos
    public function courses()    {
        return $this->hasMany('App\Models\Course');
    }

     // Relacion uno a muchos inversa
     public function user(){
        return $this->belongsTo('\App\Models\User');
    }
}
