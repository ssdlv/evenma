<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de la Corniche, Casablanca 20100',
            'event_image' => 'card-blog1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de la Corniche, Casablanca 20100',
            'event_image' => 'color2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de la Corniche, Casablanca 20100',
            'event_image' => 'card-blog2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Place Mohammed V, 20190 Casablanca',
            'event_image' => 'card-blog3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Place Mohammed V, 20190 Casablanca',
            'event_image' => 'color1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Place Mohammed V, 20190 Casablanca',
            'event_image' => 'color3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Place Mohammed V, 20190 Casablanca',
            'event_image' => 'card-blog1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 2,
            'cities_id' => 1,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Place Mohammed V, 20190 Casablanca',
            'event_image' => 'color2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 2,
            'cities_id' => 4,
            'types_id' => 4,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Anfa Place, Casablanca 20250',
            'event_image' => 'card-blog2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 2,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Anfa Place, Casablanca 20250',
            'event_image' => 'card-blog3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Anfa Place, Casablanca 20250',
            'event_image' => 'color1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Anfa Place, Casablanca 20250',
            'event_image' => 'color3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Anfa Place, Casablanca 20250',
            'event_image' => 'card-blog1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard Al Massira Al Khadra, Casablanca 20250',
            'event_image' => 'color2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard Al Massira Al Khadra, Casablanca 20250',
            'event_image' => 'card-blog2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard Al Massira Al Khadra, Casablanca 20250',
            'event_image' => 'card-blog3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 3,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard Al Massira Al Khadra, Casablanca 20250',
            'event_image' => 'color1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 3,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard Al Massira Al Khadra, Casablanca 20250',
            'event_image' => 'color3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 3,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => '4 Rue El Kadi Iass, Casablanca 20000',
            'event_image' => 'color4.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => '4 Rue El Kadi Iass, Casablanca 20000',
            'event_image' => 'color2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => '4 Rue El Kadi Iass, Casablanca 20000',
            'event_image' => 'card-blog1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => '4 Rue El Kadi Iass, Casablanca 20000',
            'event_image' => 'card-blog3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => '4 Rue El Kadi Iass, Casablanca 20000',
            'event_image' => 'color3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'card-blog3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'color4.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 2,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'color1.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 2,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'card-blog2.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 2,
            'cities_id' => 3,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'card-blog3.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de la Corniche, Casablanca 20100',
            'event_image' => 'color4.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de la Corniche, Casablanca 20100',
            'event_image' => 'card-blog4.jpg',
            'event_state' => 1,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        //Waiting
        Event::create([
            'event_title' => 'Foire Internationle De Casablanca Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => '4 Rue El Kadi Iass, Casablanca 20000',
            'event_image' => 'card-blog4.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'users_id' => 3,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => '4 Rue El Kadi Iass, Casablanca 20000',
            'event_image' => 'color2.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'users_id' => 3,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'card-blog1.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 3,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'card-blog4.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'users_id' => 2,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'color5.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'users_id' => 2,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'color5.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 2,
            'cities_id' => 3,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);

        Event::create([
            'event_title' => 'Foire Internationle De Casablanca Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de Barritz, Casablanca',
            'event_image' => 'color5.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 1,
            'types_id' => 1,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Exposition CORPUS Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de la Corniche, Casablanca 20100',
            'event_image' => 'color2.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'users_id' => 1,
            'cities_id' => 4,
            'types_id' => 3,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        Event::create([
            'event_title' => 'Appel à projets artistiques et culturels Not',
            'event_desc' => 'The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.',
            'event_location' => 'Boulevard de la Corniche, Casablanca 20100',
            'event_image' => 'card-blog1.jpg',
            'event_state' => 0,
            'event_date' => time(),
            'event_start' => time(),
            'event_end' => (time() + 7200),
            'users_id' => 1,
            'cities_id' => 2,
            'types_id' => 6,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
    }
}
