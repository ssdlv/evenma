<?php


namespace App\Dao;

use App\View;
use Illuminate\Support\Facades\DB;

class ViewDao
{
    /**
     * @param View $view
     * @return View
     */
    public function add(View $view)
    {
        return View::create([
            'events_id' => $view->event,
            'view_source' => $view->source,
        ]);
    }

    /**
     * @param $event
     * @return int
     */
    public function count($event)
    {
        return DB::table('views')
            ->where([
                ['events_id','=',$event],
            ])
            ->count();
        //return $count;
    }

    public function check($data)
    {
        return DB::table('views')
            ->where([
                ['events_id','=',$data['event']],
                ['view_source','=',$data['source']],
            ])
            ->count();
    }
}
