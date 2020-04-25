<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 39; $i++){
            Option::create([
                'events_id' => $i,
                'link0' => 'https://www.facebook.com/',
                'link1' => 'https://www.instagram.com/',
                'link2' => 'http://evenma.herokuapp.com/',
                'phone0' => '00212700474173',
                'phone1' => '00212700791198',
                'phone2' => '00242066712997',
                'delete' => false,
            ]);
        }
    }
}
