<?php

use App\Picture;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 39; $i++){
            Picture::create([
                'events_id' => $i,
                'picture_url' => 'color5.jpg',
                'picture_created' => time(),
                'picture_updated' => time(),
            ]);
            Picture::create([
                'events_id' => $i,
                'picture_url' => 'color1.jpg',
                'picture_created' => time(),
                'picture_updated' => time(),
            ]);
            Picture::create([
                'events_id' => $i,
                'picture_url' => 'card-blog4.jpg',
                'picture_created' => time(),
                'picture_updated' => time(),
            ]);
            /*for ($j = 1; $j <= 3; $j++){
                Picture::create([
                    'events_id' => $i,
                    'picture_url' => 'card-blog1.jpg',
                    'picture_created' => time(),
                    'picture_updated' => time(),
                ]);
            }*/
        }
    }
}
