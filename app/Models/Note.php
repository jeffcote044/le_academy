<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function noteable(){
        return $this->morphTo();
    }

    // Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo('\App\Models\User');
    }
    
    // Relacion uno a muchos polimorfica
    public function notes(){
        return $this->morphMany('App\Models\Note','noteable');
    }
    
}
