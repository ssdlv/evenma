<?php


namespace App\Dao;


use App\Item;
use Illuminate\Support\Facades\DB;

class ItemDao
{
    public function add(Item $item)
    {
        $result = Item::create([
            'item_title' => $item->title,
            'item_start' => $item->start,
            'item_end' => $item->end,
            'elements_id' => $item->element,
            'item_created' => time(),
            'item_updated' => time(),
        ]);
        return $result;
    }
    public function delete($id)
    {
        $result = DB::table('items')
            ->where([
                ['id','=',$id],
            ])
            ->update([
                ['items.delete' => true]
            ]);
        return $result;
    }
    public function edit(Item $item)
    {
        $result = DB::table('items')
            ->where([
                ['id','=',$item->id],
            ])
            ->update([
                [
                    'item_title' => $item->title,
                    'item_start' => $item->start,
                    'item_end' => $item->end,
                    'item_updated' => time(),
                ]
            ]);
        return $result;
    }
    public function get($id)
    {
        $result = DB::table('items')
            ->where([
                ['id','=',$id],
            ])
            ->get();
        return $result;
    }
    public function getAll()
    {
        $result = DB::table('items')
            ->where([
                ['items.delete','=',false],
            ])
            ->get();
        return $result;
    }
    public function getByElement($elements)
    {
        $results = DB::table('items')
            ->where([
                ['items.delete','=',false],
                ['items.elements_id','=',$elements],
            ])
            ->get();
        return $results;
    }
}
