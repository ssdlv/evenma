<?php

use App\Element;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 39; $i++){
            for ($j = 1; $j <= 2; $j++){
                //$text = "";
                ($j == 1? $text = "One" : $text = "Two");
                Element::create([
                    'element_title' => "Element $text Event $i",
                    'events_id' => $i,
                    'element_date' => time(),
                    'element_created' => time(),
                    'element_updated' => time(),
                ]);
            }
        }
    }
}
