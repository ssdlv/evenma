<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    public $timestamps = false;
    protected $fillable = [
        'id', 'type_name', 'type_created', 'type_updated', 'type_status', 'delete'
    ];
}
