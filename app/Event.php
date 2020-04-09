<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property false|int end
 * @property false|int start
 * @property String title
 * @property String location
 * @property String desc
 * @property mixed city
 * @property mixed type
 * @property false|int date
 * @property mixed file
 * @property mixed user
 * @property integer id
 */
class Event extends Model
{
    protected $table = 'events';
    public $timestamps = false;
    protected $fillable = [
        'id', 'event_desc', 'event_title', 'event_state', 'event_image', 'event_date', 'event_start', 'event_end'
        ,'event_location', 'event_priority', 'event_created', 'event_updated', 'users_id', 'delete'
        ,'cities_id', 'types_id','event_created','event_updated'
    ];

    public static $rules = [
        'event-title'=> 'required|string|min:3',
        'event-desc'=> 'required|min:50',
        'event-location'=> 'required|min:3',
        'event-select-type'=> 'required|integer',
        'event-select-city'=> 'required|integer',
        'event-date-start'=> 'required|date',
        'event-time-start'=> 'required|date_format:H:i',
    ];
    public static $messages = [
        'title.required'=> 'Ce champs est obligatoire !',
        'desc.required'=> 'Ce champs est obligatoire !',
        'image.required'=> 'Ce champs est obligatoire !',
        'location.required'=> 'Ce champs est obligatoire !',
    ];
}
