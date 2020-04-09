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

    public static $rules = [
        //'email' => ['required', 'string', 'email', 'max:255'],
        //'password' => ['required', 'string', 'min:6'],
        'event-picture0' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png', 'size'=>'max:500', 'dimensions:min_width=225,min_height=225'],
        'event-picture1' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png', 'size'=>'max:500'],
        'event-picture2' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png', 'size'=>'max:500'],
        'event-picture3' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png', 'size'=>'max:500'],
    ];

    public static $messages = [];
}
