<?php


namespace App\Dao;


use App\Element;
use Illuminate\Support\Facades\DB;

class ElementDao
{
    public function add(Element $element)
    {
        $element = Element::create([
            'events_id' => $element->event,
            'element_title' => $element->title,
            'element_date' => $element->date,
            'element_status' => true,
            'element_created' => time(),
            'element_updated' => time(),
        ]);
        return $element;
    }
    public function delete($id)
    {
        $result = DB::table('elements')
            ->where([
                ['id','=',$id],
            ])
            ->update([
                [
                    'elements.delete' => true,
                    'element_updated' => time(),
                ]
            ]);
        return $result;
    }
    public function edit(Element $element)
    {
        $element = DB::table('elements')
            ->where([
                ['id','=',$element->id],
            ])
            ->update([
                [
                    'element_title' => $element->title,
                    'element_date' => $element->date,
                    'element_updated' => time(),
                ]
            ]);
        return $element;
    }
    public function get($id)
    {
        $element = DB::table('elements')
            ->where([
                ['id','=',$id],
            ])
            ->get();
        return $element;
    }
    public function getAll()
    {
        $elements = DB::table('elements')
            ->where([
                ['elements.delete','=',false],
            ])
            ->get();
        return $elements;
    }
    public function getByEvent($event)
    {
        $elements = DB::table('elements')
            ->where([
                ['events_id','=',$event],
                ['elements.delete','=',false],
            ])
            ->get();
        return $elements;
    }
}
