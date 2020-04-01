<?php


namespace App\Dao;


use App\Event;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EventDao
{
    protected static $orderBy = 'event_updated';
    protected static $limit = 12;
    protected static $column = [
        'event_title', 'event_desc',
        'event_image', 'event_priority',
        'type_name', 'events.id as event_id'
    ];
    protected static $select = [
        'events.id as event_id','event_title','event_desc',
        'event_start','event_image','event_priority','event_updated',
        'types.id as idT','type_name',
        'cities.id as idC','city_name'
    ];
    /***
     * @param Event $event
     * @return Event
     */
    public function add(Event $event)
    {
        $event = Event::create([
            'event_title' => $event->title,
            'event_desc' => $event->desc,
            'event_location' => $event->location,
            'event_priority' => '0',
            'event_image' => $event->file,
            'event_state' => false,
            'event_start' => $event->start,
            'users_id' => $event->user,
            'cities_id' => $event->city,
            'types_id' => $event->type,
            'event_created' => time(),
            'event_updated' => time(),
        ]);
        return $event;
    }
    /**
     * @param Event $event
     * @return Event|int
     */
    public function edit(Event $event)
    {
        $event = DB::table('events')
            ->where([
                ['id','=',$event->id],
            ])
            ->update([
                'event_desc' => $event->desc,
                'event_title' => $event->title,
                'event_location' => $event->title,
                'event_image' => $event->file,
                'event_state' => false,
                'event_start' => $event->start,
                'cities_id' => $event->city,
                'types_id' => $event->type,
                'event_updated' => time(),
            ]);
        return $event;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $result = DB::table('events')
            ->where([
                ['id','=',$id],
            ])
            ->update([
                'events.delete' => true
            ]);
        return $result;
    }

    /**
     * @param $id
     * @return int
     */
    public function publish($id)
    {
        $result = DB::table('events')
            ->where([
                ['id','=',$id],
            ])
            ->update([
                'events.event_state' => true,
                'events.event_updated' => time()
            ]);
        return $result;
    }


    /**
     * @param $data
     * @return int
     */
    public function priority($data)
    {
        $result = DB::table('events')
            ->where([
                ['id','=',$data['id']],
            ])
            ->update([
                'events.event_priority' => $data['priority']
            ]);
        return $result;
    }

    /**
     * @param $id
     * @return Collection
     */
    public function get($id)
    {
        $event = DB::table('events')
            ->select(
                'events.id as event_id','event_title','event_desc',
                'event_start','event_image','event_location','event_date',
                'type_name','types_id',
                'city_name','cities_id'
            )
            ->where([
                ['events.id','=',$id],
            ])
            ->join('types','events.types_id','=','types.id')
            ->join('cities','events.cities_id','=','cities.id')
            //->join('pictures','pictures.events_id','=','pictures.id')
            ->get();
        return $event;
    }


    /**
     * @param $data
     * @return Collection
     */
    public function getAll($data)
    {
        //$limit = 5;
        $offset = self::$limit * ($data['page'] - 1);
        //$orderBy = 'event_created';
        if ($data != null){
            if ($data['city'] != 0 && $data['type'] != 0){
                $events = DB::table('events')
                    ->select(
                        self::$select
                    )
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        ['events.types_id','=',$data['type']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                    ])
                    //->join('cities','events.cities_id','=','cities.id')
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    //->orderBy('events.event_priority', 'desc')
                    ->orderBy(self::$orderBy, 'desc')
                    //->orderBy('events.id', 'asc')
                    ->get();
            }
            elseif ($data['city'] != 0){
                $events = DB::table('events')
                    ->select(
                        self::$select
                    )
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        //['events.types_id','=',$data['type']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                    ])
                    //->join('cities','events.cities_id','=','cities.id')
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    ->orderBy(self::$orderBy, 'desc')
                    ->get();
            }
            elseif ($data['type'] != 0){
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        ['events.types_id','=',$data['type']],
                        //['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                    ])
                    //->join('cities','events.cities_id','=','cities.id')
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    ->orderBy(self::$orderBy, 'desc')
                    ->get();
            }
            else {
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        //['events.types_id','=',$data['type']],
                        //['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                    ])
                    //->join('cities','events.cities_id','=','cities.id')
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    ->orderBy(self::$orderBy, 'desc')
                    ->get();
            }
        }
        else{
            $events = DB::table('events')
                ->select(self::$select)
                ->where([
                    ['events.delete','=',false],
                    ['events.event_state','=',true],
                    //['events.event_start','>=',$data['start']],
                    //['events.event_start','<=',$data['end']],
                ])
                //->join('cities','events.cities_id','=','cities.id')
                ->join('types','events.types_id','=','types.id')
                ->join('cities','events.cities_id','=','cities.id')
                ->orderBy(self::$orderBy, 'desc')
                ->get();
        }
        return $events;
    }

    /**
     * @param $data
     * @return Collection
     */
    public function searchAll($data)
    {
        $offset = self::$limit * ($data['page'] - 1);
        if ($data != null){
            if ($data['city'] != 0 && $data['type'] != 0){
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        ['events.types_id','=',$data['type']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_title','like',$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        ['events.types_id','=',$data['type']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_desc','like','%'.$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    ->orderBy(self::$orderBy, 'desc')
                    ->get();
            }
            elseif ($data['city'] != 0){
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        //['events.types_id','=',$data['type']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_title','like','%'.$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        //['events.types_id','=',$data['type']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_desc','like',$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    ->orderBy(self::$orderBy, 'desc')
                    ->get();
            }
            elseif ($data['type'] != 0){
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        ['events.types_id','=',$data['type']],
                        //['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_title','like',$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        ['events.types_id','=',$data['type']],
                        //['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_desc','like','%'.$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    ->orderBy(self::$orderBy, 'desc')
                    ->get();
            }
            else {
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        //['events.types_id','=',$data['type']],
                        //['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_title','like',$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.event_state','=',true],
                        //['events.types_id','=',$data['type']],
                        //['events.cities_id','=',$data['city']],
                        ['events.event_start','>=',$data['start']],
                        ['events.event_start','<=',$data['end']],
                        ['events.event_desc','like','%'.$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->offset($offset)   //->skip(2)
                    ->limit(self::$limit)   //->take(3)
                    ->orderBy(self::$orderBy, 'desc')
                    ->get();
            }
        }
        else{
            $events = DB::table('events')
                ->select(self::$select)
                ->where([
                    ['events.delete','=',false],
                    ['events.event_state','=',true],
                    ['events.event_title','like',$data['search'].'%'],
                    //['events.event_start','>=',$data['start']],
                    //['events.event_start','<=',$data['end']],
                ])
                ->orWhere([
                    ['events.delete','=',false],
                    ['events.event_state','=',true],
                    ['events.event_desc','like','%'.$data['search'].'%'],
                ])
                ->join('types','events.types_id','=','types.id')
                ->join('cities','events.cities_id','=','cities.id')
                ->orderBy(self::$orderBy, 'desc')
                ->get();
        }
        return $events;
    }

    /**
     * @param $data
     * @return Collection
     */
    public function getByType($data)
    {
        $events = DB::table('events')
            ->select(self::$select)
            ->where([
                ['events.delete','=',false],
                ['events.id','<>',$data['current']],
                ['events.types_id','=',$data['type']],
            ])
            ->join('types','events.types_id','=','types.id')
            ->join('cities','events.cities_id','=','cities.id')
            ->orderBy('event_priority','desc')
            ->limit($data['limit'])
            //->paginate(5);
            ->get();
        return $events;
    }

    /**
     * @param $data
     * @return Collection
     */
    public function getByUser($data)
    {
        if ($data != null){
            if (session('users.profile') == 'admin'){
                $offset = $data['limit'] * ($data['page'] - 1);
                if ($data['city'] != 0 && $data['type'] != 0){
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.event_state','=',$data['state']],
                            ['events.cities_id','=',$data['city']],
                            ['events.types_id','=',$data['type']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
                elseif ($data['city'] != 0){
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.event_state','=',$data['state']],
                            ['events.cities_id','=',$data['city']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
                elseif ($data['type'] != 0){
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.event_state','=',$data['state']],
                            ['events.types_id','=',$data['type']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
                else{
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.event_state','=',$data['state']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
            }
            else {
                $offset = $data['limit'] * ($data['page'] - 1);
                if ($data['city'] != 0 && $data['type'] != 0){
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.users_id','=',$data['user']],
                            ['events.event_state','=',$data['state']],
                            ['events.cities_id','=',$data['city']],
                            ['events.types_id','=',$data['type']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
                elseif ($data['city'] != 0){
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.users_id','=',$data['user']],
                            ['events.event_state','=',$data['state']],
                            ['events.cities_id','=',$data['city']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
                elseif ($data['type'] != 0){
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.users_id','=',$data['user']],
                            ['events.event_state','=',$data['state']],
                            ['events.types_id','=',$data['type']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
                else{
                    $events = DB::table('events')
                        ->select(self::$select)
                        ->where([
                            ['events.delete','=',false],
                            ['events.users_id','=',$data['user']],
                            ['events.event_state','=',$data['state']],
                        ])
                        ->join('types','events.types_id','=','types.id')
                        ->join('cities','events.cities_id','=','cities.id')
                        ->orderBy(self::$orderBy,'desc')
                        ->offset($offset)   //->skip(2)
                        ->limit($data['limit'])
                        ->get();
                }
            }
        }
        else{
            $events = null;
        }
        return $events;
    }

    public function searchByUser($data)
    {
        if ($data != null){
            $offset = $data['limit'] * ($data['page'] - 1);
            if ($data['city'] != 0 && $data['type'] != 0){
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.cities_id','=',$data['city']],
                        ['events.types_id','=',$data['type']],
                        ['events.event_title','like',$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.cities_id','=',$data['city']],
                        ['events.types_id','=',$data['type']],
                        ['events.event_desc','like','%'.$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->orderBy(self::$orderBy,'desc')
                    ->offset($offset)   //->skip(2)
                    ->limit($data['limit'])
                    ->get();
            }
            elseif ($data['city'] != 0){
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_title','like',$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.cities_id','=',$data['city']],
                        ['events.event_desc','like','%'.$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->orderBy(self::$orderBy,'desc')
                    ->offset($offset)   //->skip(2)
                    ->limit($data['limit'])
                    ->get();
            }
            elseif ($data['type'] != 0){
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.types_id','=',$data['type']],
                        ['events.event_title','like',$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.types_id','=',$data['type']],
                        ['events.event_desc','like','%'.$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->orderBy(self::$orderBy,'desc')
                    ->offset($offset)   //->skip(2)
                    ->limit($data['limit'])
                    ->get();
            }
            else{
                $events = DB::table('events')
                    ->select(self::$select)
                    ->where([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.event_title','like',$data['search'].'%'],
                    ])
                    ->orWhere([
                        ['events.delete','=',false],
                        ['events.users_id','=',$data['user']],
                        ['events.event_state','=',$data['state']],
                        ['events.event_desc','like','%'.$data['search'].'%'],
                    ])
                    ->join('types','events.types_id','=','types.id')
                    ->join('cities','events.cities_id','=','cities.id')
                    ->orderBy(self::$orderBy,'desc')
                    ->offset($offset)   //->skip(2)
                    ->limit($data['limit'])
                    ->get();
            }
        }
        else{
            $events = null;
        }
        return $events;
    }

    public function run($data)
    {
        $result = null;
        switch ($data['operation'])
        {
            case 'publish':
            {
                $result = $this->publish($data['element']);
                //return $result;
                break;
            }
            case 'delete':
            {
                $result = $this->delete($data['element']);
                //return $result;
                break;
            }
        }
        return $result;
    }

    public static function count()
    {

    }

    public function eLast($data = null)
    {
        if (\session('users.profile') == 'admin'){
            return DB::table('events')
                ->select(self::$select)
                ->where([
                    ['event_state','=',1],
                    ['events.delete','=',false],
                ])
                ->join('types','events.types_id','=','types.id')
                ->join('cities','events.cities_id','=','cities.id')
                ->limit(9)
                ->get();
        }
        else {
            return DB::table('events')
                ->select(self::$select)
                ->where([
                    ['event_state','=',1],
                    ['events.delete','=',false],
                    ['users_id','=',\session('users.id')],
                ])
                ->join('types','events.types_id','=','types.id')
                ->join('cities','events.cities_id','=','cities.id')
                ->limit(9)
                ->get();
        }

    }
}
