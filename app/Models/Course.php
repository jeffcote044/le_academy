<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students','reviews'];

    const BORRADOR  = 1;
    const REVISION  = 2;
    const PUBLICADO = 3;
    const VALUE = 1;
    const PERCENTAGE = 2;

    public function getRatingAttribute(){
      
        if($this->reviews_count){
           return round($this->reviews->avg('rating'), 1);
        }
    }
    public function getFinalPriceAttribute(){
        
        if ($this->discount) {
            if ($this->discount->type == 1) {
                return number_format($this->discount->value, 2);
            }
            else{
                return number_format($this->price->value - ($this->discount->value * ($this->price->value /100)), 2);
            }    
        }
        else{
            return number_format($this->price->value, 2);
        }       
        
    }

    public function getLastUpdateAttribute(){
        return $this->updated_at->diffForHumans();
    }

    //Query Scope
    public function scopeCategory($query, $category_id){
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }
    public function scopeLevel($query, $level_id){
        if($level_id){
            return $query->where('level_id', $level_id);
        }
    }

    //URL's Amigables
    public function getRouteKeyName(){
        return "slug";
    }

    //Relacion uno a uno
     public function observation(){
        return $this->hasOne('App\Models\Observation');
     }
    
    //Relacion uno a muchos
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }
    
    //Relacion uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function price(){
        return $this->belongsTo('App\Models\Price');
    }
    public function discount(){
        return $this->belongsTo('App\Models\Discount');
    }

    //Relacion muchos a muchos 
    public function students(){
        return $this->belongsToMany('App\Models\User')->withPivot('created_at');
    }

    // Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }

    // Relacion a traves de tablas
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson','App\Models\Section');
    }
    
}
