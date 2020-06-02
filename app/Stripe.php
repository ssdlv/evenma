<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    /**
     * @var string
     */
    private $api_key;

    /**
     * Stripe constructor.
     * @param string $api_key
     */
    public function __construct (string $api_key = null)
    {
        $this->api_key = ($api_key != null && $api_key!= '') ? $api_key : env ('STRIPE_SECRET_KEY_TEST');
    }
    //customers
    public function api(string $url, $data) : \stdClass
    {
        $curl = curl_init ();
        curl_setopt_array (
            $curl,
            [
                CURLOPT_URL => "https://api.stripe.com/v1/$url",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERPWD => $this->api_key,
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_POSTFIELDS => http_build_query ($data)
            ]
        );
        $response = json_decode (curl_exec ($curl));
        curl_close ($curl);
        /*if (property_exists ($response,'error')){
            throw new Exception($response->error->message);
        }*/
        return $response;
    }
}
