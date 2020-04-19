<?php


namespace App\Dao;

use App\Option;
use Illuminate\Support\Facades\DB;

class OptionDao
{
    public function add(Option $option)
    {
        $result = Option::create([
            'events_id' => $option->event,
            'link0' => $option->link0,
            'link1' => $option->link1,
            'link2' => $option->link2,
            'link3' => $option->link3,
            'link4' => $option->link4,
            'phone0' => $option->phone0,
            'phone1' => $option->phone1,
            'phone2' => $option->phone2,

        ]);
        return $result;
    }
    public function edit($option)
    {
        $result = DB::table('options')
            ->where([
                ['id','=',$option->id],
            ])
            ->update([
                'link0' => $option->link0,
                'link1' => $option->link1,
                'link2' => $option->link2,
                'link3' => $option->link3,
                'link4' => $option->link4,
                'phone0' => $option->phone0,
                'phone1' => $option->phone1,
                'phone2' => $option->phone2,
            ]);
        return $result;
    }
    public function delete($id)
    {
        $result = DB::table('options')
            ->where([
                ['id','=',$id],
            ])
            ->update([
                ['options.delete' => true]
            ]);
        return $result;
    }
    public function get($id, $event = null)
    {
        if ($id != null){
            return DB::table('options')
                ->where([
                    ['options.id','=',$id],
                    ['options.delete','=',false],
                ])
                ->get();
        }
        else {
            return DB::table('options')
                ->where([
                    ['options.delete','=',false],
                    ['options.events_id','=',$event],
                ])
                ->get();
        }
    }
    public function getByEvent($event)
    {
        $results = DB::table('options')
            ->where([
                ['options.delete','=',false],
                ['options.events_id','=',$event],
            ])
            ->get();
        return $results;
    }
}
