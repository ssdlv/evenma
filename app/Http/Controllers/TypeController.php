<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\TypeDao;
use App\Event;

class TypeController extends Controller
{
    public function add(Request $request)
    {
        $tDao = new TypeDao();
        $designated = $request->get('designated');
        $tDao->add(['designated' => $designated]);
        return response()->json([
            'result' => 'success',
            'type' => 'success-message',
            'message' => 'Your type has been build!',
        ]);
    }
    public function edit(Request $request)
    {
        $tDao = new TypeDao();
        $id = $request->get('id');
        $designated = $request->get('designated');
        $tDao->edit([
            'id' => $id,
            'designated' => $designated,
        ]);
        return response()->json([
            'result' => 'success',
            'type' => 'success-message',
            'message' => 'Your type has been updated!',
        ]);
    }
    public function get(Request $request)
    {
        $tDao = new TypeDao();
        $id = $request->get('id');
        $data = $tDao->get(['id' => $id]);
        return response()->json($data);
    }
    public function delete(Request $request)
    {
        $tDao = new TypeDao();
        $id = $request->get('id');
        $data = $tDao->delete(['id' => $id]);
        return response()->json($data);
    }
    public static function all(Request $request)
    {
        $tDao = new TypeDao();
        $types = $tDao->getAll();
        //dd($results);
        foreach ($types as $type){
            $type->type_created = date('d M Y H\h : i', $type->type_created);
            $type->type_updated = date('d M Y H\h : i', $type->type_updated);
            $type->type_using = Event::all()
                ->where('delete','=',0)
                ->where('event_state','=',1)
                ->where('types_id','=', $type->id)
                ->count();
        }
        if ($request->ajax()){
            return response()->json($types);
        }else{
            //dd($results);
            return $types;
        }
    }
}
