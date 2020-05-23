<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\TeamDao;
use Validator;

class TeamController extends Controller
{
    public function all(Request $request)
    {
        $tDao = new TeamDao();
        $data = [
            'status' => $request->get('status')
        ];
        $results = $tDao->all($data);
        foreach ($results as $result){
            $result->avatar = 'files/team/' . $result->avatar;
            if ($result->founder !== null){
                $result->speciality = $result->speciality .' / '.$result->founder;
            }
        }
        return response()->json($results);
    }
    public function active(Request $request)
    {
        $tDao = new TeamDao();
        $data = [
            'status' => 'active'
        ];
        $results = $tDao->all($data);
        dd($results);
    }
    public function disable()
    {
        $tDao = new TeamDao();
        $data = [
            'status' => 'desactive'
        ];
        $results = $tDao->all($data);
        dd($results);
    }
}
