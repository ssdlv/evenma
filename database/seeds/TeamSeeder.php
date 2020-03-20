<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'avatar' => 'christian.jpg',
            'first_name' => 'Evariste',
            'last_name' => 'ABIRA',
            'email0' => 'mspeedy733@gmail.com',
            'email1' => 'evenma.org@gmail.com',
            'phone0' => '+212700474173',
            'phone1' => '+242066010028',
            'phone2' => '+242066712997',
            'twitter' => 'https://wwww.twitter.com',
            'facebook' => 'https://wwww.facebook.com',
            'instagram' => 'https://wwww.instagram.com',
            'speciality' => 'CEO',
            'founder' => 'CO-FOUNDER',
            'description' => 'And I love you like Kanye loves Kanye. We need to restart the human foundation.',
        ]);
        Team::create([
            'avatar' => 'kendall.jpg',
            'first_name' => 'Candis',
            'last_name' => 'OMBOYO',
            'email0' => 'mspeedy733@gmail.com',
            'email1' => 'evenma.org@gmail.com',
            'phone0' => '+212700474173',
            'phone1' => '+212700474173',
            'phone2' => '+242066712997',
            'twitter' => 'https://wwww.twitter.com',
            'facebook' => 'https://wwww.facebook.com',
            'instagram' => 'https://wwww.instagram.com',
            'speciality' => 'DESIGNER',
            'description' => 'And I love you like Kanye loves Kanye. We need to restart the human foundation.',
        ]);
        Team::create([
            'avatar' => 'marc.jpg',
            'first_name' => 'Mariel Evha',
            'last_name' => 'ABIR',
            'email0' => 'mspeedy733@gmail.com',
            'email1' => 'evenma.org@gmail.com',
            'phone0' => '+212700474173',
            'phone1' => '+212700474173',
            'phone2' => '+242066712997',
            'twitter' => 'https://wwww.twitter.com',
            'facebook' => 'https://wwww.facebook.com',
            'instagram' => 'https://wwww.instagram.com',
            'speciality' => 'WEB DEVELOPER',
            'founder' => 'CO-FOUNDER',
            'description' => 'And I love you like Kanye loves Kanye. We need to restart the human foundation.',
        ]);
        Team::create([
            'avatar' => 'avatar.jpg',
            'first_name' => 'Ciceronne',
            'last_name' => 'ABIR',
            'email0' => 'mspeedy733@gmail.com',
            'email1' => 'evenma.org@gmail.com',
            'phone0' => '+212700474173',
            'phone1' => '+212700474173',
            'phone2' => '+242066712997',
            'twitter' => 'https://wwww.twitter.com',
            'facebook' => 'https://wwww.facebook.com',
            'instagram' => 'https://wwww.instagram.com',
            'speciality' => 'WEB DEVELOPER',
            'description' => 'And I love you like Kanye loves Kanye. We need to restart the human foundation.',
        ]);
    }
}
