<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['type_name' => 'Culturel', 'type_created' => time(), 'type_updated' => time(),]);
        Type::create(['type_name' => 'Foire', 'type_created' => time(), 'type_updated' => time(),]);
        Type::create(['type_name' => 'Exposition', 'type_created' => time(), 'type_updated' => time(),]);
        Type::create(['type_name' => 'Hackaton', 'type_created' => time(), 'type_updated' => time(),]);
        Type::create(['type_name' => 'Découverte', 'type_created' => time(), 'type_updated' => time(),]);
        Type::create(['type_name' => 'Appel D\'Offres', 'type_created' => time(), 'type_updated' => time(),]);
    }
}
