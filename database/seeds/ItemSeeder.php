<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 78; $i++){
            for ($j = 1; $j <= 2; $j++){
                ($j == 1? $text = "One" : $text = "Two");
                Item::create([
                    'item_title' => "Item $text Element $i",
                    'item_start' => time(),
                    'item_end' => time() + (3600 * 2),
                    'elements_id' => $i,
                    'item_created' => time(),
                    'item_updated' => time()
                ]);
            }
        }
        /*Item::create(['item_title' => 'Corpus One', 'item_start' => time(), 'item_end' => time() + (3600 * 2), 'elements_id' => 1, 'item_created' => time(), 'item_updated' => time(),]);
        Item::create(['item_title' => 'Corpus Two', 'item_start' => time() + (3600 * 2), 'item_end' => time() + (3600 * 4), 'elements_id' => 1, 'item_created' => time(), 'item_updated' => time(),]);
        Item::create(['item_title' => 'Corpus Three', 'item_start' => time(), 'item_end' => time() + (3600 * 2), 'elements_id' => 2, 'item_created' => time(), 'item_updated' => time(),]);
        Item::create(['item_title' => 'Corpus Four', 'item_start' => time() + (3600 * 2), 'item_end' => time() + (3600 * 4), 'elements_id' => 2, 'item_created' => time(), 'item_updated' => time(),]);*/
    }
}
