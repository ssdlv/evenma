<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = false;
    protected $fillable = [
        'id', 'city_name', 'city_created', 'city_updated', 'city_status', 'delete'
    ];
}
