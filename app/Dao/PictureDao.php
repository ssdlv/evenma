<?php


namespace App\Dao;

use App\Picture;
use Illuminate\Support\Facades\DB;

class PictureDao
{
    public function add(Picture $picture)
    {
        $result = Picture::create([
            'events_id' => $picture->event,
            'picture_url' => $picture->url,
            'picture_created' => time(),
            'picture_updated' => time(),
        ]);
        return $result;
    }
    public function edit($data)
    {
        $result = DB::table('pictures')
            ->where([
                ['id','=',$data['id']],
            ])
            ->update([
                'pictures.picture_url' => $data['url']
            ]);
        return $result;
    }
    public function delete($id)
    {
        $result = DB::table('pictures')
            ->where([
                ['id','=',$id],
            ])
            ->update([
                ['pictures.delete' => true]
            ]);
        return $result;
    }
    public function get($id)
    {
        $result = DB::table('pictures')
            ->where([
                ['pictures.id','=',$id],
                ['pictures.delete','=',false],
            ])
            ->get();
        return $result;
    }
    public function getByEvent($event)
    {
        $results = DB::table('pictures')
            ->where([
                ['pictures.delete','=',false],
                ['pictures.events_id','=',$event],
            ])
            ->get();
        return $results;
    }
}
