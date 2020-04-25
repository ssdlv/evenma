<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed state
 * @property mixed phone0
 * @property mixed phone1
 * @property mixed phone2
 * @property mixed email0
 * @property mixed email1
 * @property mixed avatar
 * @property mixed founder
 * @property mixed twitter
 * @property mixed linkedin
 * @property mixed facebook
 * @property mixed instagram
 * @property mixed last_name
 * @property mixed first_name
 * @property mixed speciality
 */
class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'id','first_name','last_name',
        'phone0','phone1','phone2',
        'email0','email1','speciality',
        'facebook','twitter','instagram','linkedin',
        'state','delete','founder','avatar'
    ];
}
