<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed event
 * @property mixed link0
 * @property mixed link1
 * @property mixed link2
 * @property mixed link3
 * @property mixed link4
 * @property mixed phone0
 * @property mixed phone1
 * @property mixed phone2
 * @property mixed delete
 */
class Option extends Model
{
    protected $table = 'options';
    //public $timestamps = false;
    protected $fillable = [
        'id','events_id','delete'
        ,'phone0','phone1','phone2'
        ,'link0','link1','link2','link3','link4'
    ];

    public function events(){
        return $this->belongsTo (Event::class,'events_id');
    }
}
