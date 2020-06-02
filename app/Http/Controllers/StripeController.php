<?php

namespace App\Http\Controllers;

use App\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(){
        return view ('stripe');
    }
    public function payment(Request $request){
        $name = $request->post ('name');
        $email = $request->post ('email');
        $token = $request->post ('stripeToken');
        if (filter_var ($email, FILTER_VALIDATE_EMAIL) && !empty($token) && !empty($name)){
            $data = [
                'source' => $token,
                'name' => $name,
                'description' => $name,
                'email' => $email
            ];
            $stripe = new Stripe();
            //Build customer
            $customer = $stripe->api ('customers', $data);
            //Make payment
            $charge = $stripe->api ('charges', [
                'amount' => 1000, //amount in cents : 1000 equals 10 euro
                'currency' => 'eur',
                'customer' => $customer->id
            ]);
            //Display a successful payment confirmation message to the customer.
            //End operation
            dd ($customer, $charge);
        }
    }

    public function plan(Request $request){
        $name = $request->post ('name');
        $name = ($name != null && $name != '') ? $name : 'Premium';
        $stripe = new Stripe();
        $response = $stripe->api ('plans', [
            'amount' => 5000,
            'interval' => 'month', //month|year||||
            'currency' => 'eur',
            'product[name]' => $name
        ]);
        dd ($response);
    }
    public function subscription(){
        $plan = 'plan_H9zUkVdaf29yiq';

        $customer = 'cus_H9ypIfzlbYWVlC';
        $stripe = new Stripe();
        $response = $stripe->api ("subscriptions", [
            'customer' => $customer,
            'items[0][plan]' => $plan
        ]);
        dd ($response);
    }
    /*curl https://api.stripe.com/v1/subscriptions \
  -u sk_test_hNnJWY16JPUpeCfKKkAbi8AJ0084wUQamI: \
  -d customer=cus_H9ysaGFaSQ76Hb \
  -d "items[0][plan]"=premium*/
}
