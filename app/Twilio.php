<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class Twilio extends Model
{
    public function send(array $data){
        try {
            $client = new Client(
                env ('TWILIO_ID'),
                env ('TWILIO_TOKEN')
            );
            $message = $client
                ->messages
                ->create (
                $data['to'],
                    [
                        'from' => env ('TWILIO_PHONE_FROM'),
                        'body' => $data['message']
                    ]
            );
            return $message;
        } catch (ConfigurationException $e) {
            return $e->getMessage ();
        }
    }
    public function call(array $data){
        try {
            $client = new Client(
                env ('TWILIO_ID'),
                env ('TWILIO_TOKEN')
            );
            $call = $client->calls->create (
                $data['to'],
                '+15005550006',
                //env ('TWILIO_CALL_FROM'),
                [
                    'url' => 'http://demo.twilio.com/docs/voice.xml'
                ]
            );
            return $call;
        } catch (ConfigurationException $e) {
            return $e->getMessage ();
        }
    }
}
