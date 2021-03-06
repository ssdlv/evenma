<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Evenma',
            'email' => 'evenma.org@gmail.com',
            'phone' => '+212700474173',
            'profile' => 'admin',
            'password' => Hash::make('evenma'),
            'confirmation_token' => true, //str_replace('/', '', bcrypt(Str::random(16))),
            //'type_created' => time(),
            //'type_updated' => time(),
        ]);
        User::create([
            'name' => 'Demo',
            'email' => 'demo@evenma.com',
            'phone' => '+212700474173',
            'profile' => 'professional',
            'password' => Hash::make('demo'),
            'confirmation_token' => true, //str_replace('/', '', bcrypt(Str::random(16))),
            //'type_created' => time(),
            //'type_updated' => time(),
        ]);
        User::create([
            'name' => 'Particular',
            'email' => 'mspeedy733@gmail.com',
            'phone' => '+212700474173',
            'profile' => 'particular',
            'password' => Hash::make('root2'),
            'confirmation_token' => true, //str_replace('/', '', bcrypt(Str::random(16))),
            //'type_created' => time(),
            //'type_updated' => time(),
        ]);
    }
}
