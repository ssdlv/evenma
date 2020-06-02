<?php


namespace App\Dao;

use App\City;
use Illuminate\Support\Facades\DB;

class CityDao
{
    protected static $limit = 12;
    public function add($data)
    {
        $result = City::create([
            'city_name' => $data['designated'],
            'city_created' => time(),
            'city_updated' => time(),
        ]);
        return $result;
    }
    public function edit($data)
    {
        $cities = DB::table('cities')
            ->where([
                ['cities.id','=',$data['id']],
            ])->update([
                'cities.city_name' => $data['designated']
            ]);
        return $cities;
    }
    public function delete($data)
    {
        $cities = DB::table('cities')
            ->where([
                ['cities.id','=',$data['id']],
            ])->update([
                'cities.delete' => true
            ]);
        return $cities;
    }
    public function get($data)
    {
        $cities = DB::table('cities')
            ->where([
                ['cities.id','=',$data['id']],
                ['cities.delete','=',false]
            ])
            ->get();
        return $cities;
    }
    public function getAll()
    {
        $cities = DB::table('cities')
            ->where([
                ['cities.delete','=',false]
            ])
            ->orderBy('city_name','asc')
            ->limit(self::$limit)
            ->get();
        return $cities;
    }
}
