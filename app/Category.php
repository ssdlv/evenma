<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    //public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];

    public function products(){
        return $this->hasMany ('App\Category');
    }
}
