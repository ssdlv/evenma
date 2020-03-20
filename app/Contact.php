<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed state
 * @property mixed email
 * @property mixed number
 * @property mixed message
 * @property mixed delete
 */
class Contact extends Model
{
    protected $table = 'contacts';
    //public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'email', 'number'
        ,'state', 'delete', 'message'
    ];

    public static $rules = [
        'name'=> 'required',
        'email'=> 'required|email',
        'number'=> 'required',
        'message'=> 'required',
    ];
    public static $messages = [
        'name.required'=> 'Ce champs est obligatoire !',
        'email.required'=> 'Ce champs est obligatoire !',
        'email.email'=> 'Email invalid !',
        'number.required'=> 'Ce champs est obligatoire !',
        'message.required'=> 'Ce champs est obligatoire !',
    ];
}
