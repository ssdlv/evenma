<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed url
 * @property mixed event
 */
class Picture extends Model
{
    protected $table = 'pictures';
    public $timestamps = false;
    protected $fillable = [
        'id', 'picture_url', 'delete'
        ,'picture_created', 'picture_updated', 'events_id'
    ];
}
