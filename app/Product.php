<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    //public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'price'
    ];
    public function category(){
        return $this->belongsTo ('App\Category');
    }
}
