<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\ViewDao;
use App\View;

class ViewController extends Controller
{
    public static function add(Request $request)
    {
        $event = $request->get('event');
        if ($event != null && $event != '' && $event != 0){
            $vDao = new ViewDao();
            $view = new View();
            if (session()->has('users.id') and session('users.id') != null){
                $source = session('users.id');
            }
            else{
                $source = null;
            }

            $data = [
                'event' => $event,
                'source' => $source,
            ];
            $check = $vDao->check($data);
            //dd($check);
            if ($check != 1){
                $view->event = $event;
                $view->source = $source;
                $result = $vDao->add($view);
                return response()->json([
                    'result' => 'success'
                ]);
            }
            else{
                return response()->json([
                    'result' => 'waiting'
                ]);
            }
        }
    }
}
