<?php


namespace App\Dao;


use App\Team;
use Illuminate\Support\Facades\DB;

class TeamDao
{
    public function add(Team $team)
    {
        return Team::create([
            'avatar' => $team->avatar,
            'founder' => $team->founder,
            'first_name' => $team->first_name,
            'last_name' => $team->last_name,
            'phone0' => $team->phone0,
            'phone1' => $team->phone1,
            'phone2' => $team->phone2,
            'email0' => $team->email0,
            'email1' => $team->email1,
            'speciality' => $team->speciality,
            'twitter' => $team->twitter,
            'facebook' => $team->facebook,
            'instagram' => $team->instagram,
            'linkedin' => $team->linkedin,
        ]);
    }
    public function all($data = null){
        if (isset($data['status'])) {
            if ($data['status'] == 'disable') {
                return DB::table('teams')
                    ->where([
                        ['state','=',false],
                        ['delete','=',false],
                    ])
                    ->get();
            }
            else {
                return DB::table('teams')
                    ->where([
                        ['state','=',true],
                        ['delete','=',false]
                    ])
                    ->get();
            }
        }
        else {
            return DB::table('teams')
                ->where([
                    ['delete','=',false]
                ])
                ->get();
        }
    }
}
