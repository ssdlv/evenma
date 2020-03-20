<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed to
 * @property mixed from
 * @property mixed title
 * @property mixed content
 * @property mixed date_read
 * @property mixed date_send
 */
class Notification extends Model
{
    protected $table = 'notifications';
    public $timestamps = false;
    protected $fillable =
        [
            'title', 'content', 'to', 'from',
            'date_send', 'date_read', 'delete',
        ];
}
