<?php

use App\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['city_name' => 'Casablanca', 'city_created' => time(), 'city_updated' => time(),]);
        City::create(['city_name' => 'Rabat', 'city_created' => time(), 'city_updated' => time(),]);
        City::create(['city_name' => 'Fes', 'city_created' => time(), 'city_updated' => time(),]);
        City::create(['city_name' => 'Meknes', 'city_created' => time(), 'city_updated' => time(),]);
        City::create(['city_name' => 'Agadir', 'city_created' => time(), 'city_updated' => time(),]);
        City::create(['city_name' => 'Settat', 'city_created' => time(), 'city_updated' => time(),]);
        City::create(['city_name' => 'Marakech', 'city_created' => time(), 'city_updated' => time(),]);
    }
}
