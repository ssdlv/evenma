<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer event
 * @property integer status
 * @property string title
 * @property mixed date
 */
class Element extends Model
{
    protected $table = 'elements';
    public $timestamps = false;
    protected $fillable = [
        'id', 'element_title', 'element_date', 'element_status'
        ,'element_created', 'element_updated', 'events_id'
    ];

    public function events(){
        return $this->belongsTo (Event::class,'events_id');
    }
}
