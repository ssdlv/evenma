<?php

namespace App\Http\Controllers;

use App\Twilio;
use Illuminate\Http\Request;

class TwilioController extends Controller
{
    public function send(){
        $data = [
            'to' => '+212700474173',
            'message' => 'Hello test Twilio body !'
        ];
        $result = (new Twilio())->send ($data);
        dd ($result);

    }
    public function call(){
        $data = [
            'to' => '+212700474173'
        ];
        $result = (new Twilio())->call ($data);
        dd ($result);

    }
}
