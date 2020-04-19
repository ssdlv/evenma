<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer start
 * @property integer end
 * @property integer status
 * @property string title
 * @property integer element
 */
class Item extends Model
{
    protected $table = 'items';
    public $timestamps = false;
    protected $fillable = [
        'id', 'item_title', 'item_start', 'item_end'
        ,'item_status','item_created', 'item_updated', 'elements_id'
    ];
}
