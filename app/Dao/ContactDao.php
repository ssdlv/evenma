<?php


namespace App\Dao;


use App\Contact;
use Illuminate\Support\Facades\DB;

class ContactDao
{
    public function add(Contact $contact)
    {
        return Contact::create([
            'name' => $contact->name,
            'email' => $contact->email,
            'number' => $contact->number,
            'message' => $contact->message,
        ]);
    }
    public function get($id)
    {
        return DB::table('contacts')
            ->where([
                ['id','=',$id],
                ['delete','=',false],
            ])
            ->get();
    }
}
