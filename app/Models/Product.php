<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table='products';
    public function scopeActive($query){
        return $query->where('category','=',2);
    }
    public function scopeSecond($query){
        return $query->where('category','=',1);
    }
    public function scopeThird($query){
        return $query->where('category','=',3);
    }


}
