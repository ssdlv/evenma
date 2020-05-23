<?php


namespace App\Dao;

use App\Type;
use Illuminate\Support\Facades\DB;

class TypeDao
{
    protected static $limit = 12;
    public function add($data)
    {
        $result = Type::create([
            'type_name' => $data['designated'],
            'type_created' => time(),
            'type_updated' => time(),
        ]);
        return $result;
    }
    public function edit($data)
    {
        $result = DB::table('types')
            ->where([
                ['types.id','=',$data['id']],
            ])->update([
                'types.type_name' => $data['designated']
            ]);
        return $result;
    }
    public function delete($data)
    {
        $result = DB::table('types')
            ->where([
                ['types.id','=',$data['id']],
            ])->update([
                'types.delete' => true
            ]);
        return $result;
    }
    public function get($data)
    {
        $result = DB::table('types')
            ->where([
                ['types.id','=',$data['id']],
                ['types.delete','=',false]
            ])
            ->get();
        return $result;
    }
    public function getAll()
    {
        return DB::table('types')
            ->where([
                ['types.delete','=',false]
            ])
            ->orderBy('type_name','asc')
            ->limit(self::$limit)
            ->get();
    }
}
