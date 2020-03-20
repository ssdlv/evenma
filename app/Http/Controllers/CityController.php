<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\CityDao;
use App\Event;

class CityController extends Controller
{
    public function add(Request $request)
    {
        $cDao = new CityDao();
        $designated = $request->get('designated');
        $cDao->add(['designated' => $designated]);
        return response()->json([
            'result' => 'success',
            'type' => 'success-message',
            'message' => 'Your city has been build!',
        ]);
    }
    public function edit(Request $request)
    {
        $cDao = new CityDao();
        $id = $request->get('id');
        $designated = $request->get('designated');
        //return response()->json($designated);
        $data = $cDao->edit([
            'id' => $id,
            'designated' => $designated,
        ]);
        return response()->json([
            'result' => 'success',
            'type' => 'success-message',
            'message' => 'Your city has been updated!',
        ]);
    }
    public function get(Request $request)
    {
        $cDao = new CityDao();
        $id = $request->get('id');
        $data = $cDao->get(['id' => $id]);
        return response()->json($data);
    }
    public function delete(Request $request)
    {
        $cDao = new CityDao();
        $id = $request->get('id');
        $data = $cDao->delete(['id' => $id]);
        return response()->json($data);
    }
    public static function all(Request $request)
    {
        //P@ssW0rdssdlv
        $cDao = new CityDao();
        $cities = $cDao->getAll();
        foreach ($cities as $city){
            $city->city_created = date('d M Y H\h : i', $city->city_created);
            $city->city_updated = date('d M Y H\h : i', $city->city_updated);
            $city->city_using = Event::all()
                ->where('delete','=',0)
                ->where('event_state','=',1)
                ->where('cities_id','=', $city->id)
                ->count();
        }
        //dd($results);
        if ($request->ajax()){
            return response()->json($cities);
        }else{
            //dd($results);
            return $cities;
        }
    }
}
