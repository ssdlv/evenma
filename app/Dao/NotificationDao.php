<?php


namespace App\Dao;


use App\Notification;
use Illuminate\Support\Facades\DB;

class NotificationDao
{
    public function add(Notification $notification)
    {
        return Notification::create(
            [
                'title' => $notification->title,
                'content' => $notification->content,
                'from' => $notification->from,
                'to' => $notification->to,
                'date_send' => time(),
            ]
        );
    }
    public function read($id)
    {
        return DB::table('notifications')
            ->where([
                ['id','=', $id]
            ])
            ->update(['date_read' => time()]);
    }
    public function get($id)
    {
        return DB::table('notifications')
            ->where([
                ['id','=',$id],
            ])
            ->get();
    }
    public function display()
    {
        $user = session('users.id');
        return DB::table('notifications')
            ->where([
                ['to','=',$user],
                ['delete','=',false],
                ['date_read','=',null],
            ])
            ->orderByDesc('date_send')
            ->get();
    }
}
