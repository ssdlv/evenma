<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Dao\ContactDao;
use App\Mail\OrderShipped;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Validator;

class ContactController extends Controller
{
    //off
    public function sendMessage(Mailer $mailer)
    {
        //Mail::to()
        $mailer->send('mails.contact', ['username' => 'Evenma'], function ($message){
            $message->to('evenma.org@gmail.com');
            $message->from('mspeedy733@gmail.com');
            $message->subject('Contact Mailler');
        });
    }

    //off
    public function store(Request $request)
    {
        //dd($request->name, $request->email, $request->message);
        $mail = 'evenma.org@gmail.com';
        $mailable = new OrderShipped('Kyle', $mail, 'messages');
        Mail::to($mail)->send($mailable);
        return 'Done !';
    }

    public function add(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $number = $request->get('number');
        $message = $request->get('message');
        //Validation
        $validation = Validator::make($request->all(), Contact::$rules, Contact::$messages);
        if ($validation->passes()){
            $cDao = new ContactDao();
            $contact = new Contact();
            $contact->name = $name;
            $contact->email = $email;
            $contact->number = $number;
            $contact->message = $message;
            $cDao->add($contact);
            if ($request->ajax()){
                return response()->json([
                    'contact' => $contact,
                    'result' => 'success',
                    'title' => 'Success',
                    'message' => 'Message Send !',
                ]);
            }
            else {
                //dump('Hello');
                return redirect()->route('contact');
            }
        }
        else{
            return response()->json([
                'result' => 'error',
                'title' => 'Error',
                'message' => 'Required !',
                'name'   => $validation->errors()->get('name'),
                'email'   => $validation->errors()->get('email'),
                'number'   => $validation->errors()->get('number'),
                'messages'   => $validation->errors()->get('message'),
                'class'  => 'is-invalid'
            ]);
        }

    }
}
