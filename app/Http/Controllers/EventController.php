<?php

namespace App\Http\Controllers;

use App\Dao\EventDao;
use App\Dao\NotificationDao;
use App\Dao\OptionDao;
use App\Dao\PictureDao;
use App\Event;
use App\Jobs\ReseizeJob;
use App\Notification;
use App\Option;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
//use Validator;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function delete(Request $request)
    {
        if (\session('users.profile') == 'admin'){
            $nDao = new NotificationDao();
            $notify = new Notification();
            $notify->to = 1;
            $notify->from = session('users.id');
            $notify->title = 'Title Notify';
            $notify->content = 'Content Notify';
            $result = $nDao->add($notify);
            if (isset($result)){
                return response()->json([
                    'result' => 'success',
                    'title' => 'Notify User',
                    'message' => 'Event not publish !',
                ]);
            }
        }
        else {
            $id = $request->get('id');
            $eDao = new EventDao();
            $result = $eDao->delete($id);
            if ($result == 1){
                return response()->json([
                    'result' => 'success',
                    'title' => 'Event Deleted !',
                    'message' => 'Your event has been deleted !',
                ]);
            }
        }
    }
    public function publish(Request $request)
    {
        if (\session('users.profile') == 'admin'){
            $event = $request->get('event');
            $eDao = new EventDao();
            $result = $eDao->publish($event);
            if ($result == 1){
                return response()->json([
                    'result' => 'success',
                    'title' => 'Event published !',
                    'message' => 'Your event has been Published !',
                ]);
            }
        }
        else {
            $nDao = new NotificationDao();
            $notify = new Notification();
            $notify->to = 1;
            $notify->from = session('users.id');
            $notify->title = 'Title Notify';
            $notify->content = 'Content Notify';
            $result = $nDao->add($notify);
            if (isset($result)){
                return response()->json([
                    'result' => 'success',
                    'title' => 'Notify Admin',
                    'message' => 'Publish my event !',
                ]);
            }
        }
    }
    public function all(Request $request)
    {
        $city = $request->get('city');
        $type = $request->get('type');
        $page = $request->get('page');
        $search = $request->get('search');

        $start = $request->get('start');
        $start = (($start / 1000) + 3600);

        $end = $request->get('end');
        $end = (($end / 1000) + 3600);

        $data = [
            'city' => $city,
            'type' => $type,
            'start' => floor($start),
            'end' => floor($end),
            'page' => $page,
            'search' => $search,
        ];
        //return response()->json($data);
        $eDao = new EventDao();
        //$elDao = new ElementDao();
        //$iDao = new ItemDao();
        if ($search != ''){
            $events = $eDao->searchAll($data);
        }else{
            $events = $eDao->getAll($data);
        }
        $elements = null; $item = null;
        foreach ($events as $event){
            //$event->event_image = 'assets/img/examples/' + $event->event_image;
            //$elements = $elDao->getByEvent($event->event_id);
            //$event->element = $elements;
            $event->event_start = date('d M Y H\h : i', $event->event_start);
            //$event->evedesc = strlen($event->desc);
            if (strlen($event->event_desc) > 148){
                $event->event_desc = substr($event->event_desc, 0,    148).'...';
            }
            /*foreach ($elements as $element){
                $element->item = $iDao->getByElement($element->id);
            }*/
            //$event->city = City::all()->where('id','=',$event->cities_id);
        }
        //dd([$events,$data]);
        return response()->json([$events,$data]);
    }
    public function get(Request $request)
    {
        $eDao = new EventDao();
        $id = $request->get('id');
        $event = $eDao->get($id);
        //dd($event);
        return response()->json($event);
    }
    public static function suggestion($data)
    {
        $eDao = new EventDao();
        $suggestions = $eDao->suggestion($data);
        foreach ($suggestions as $suggestion){
            $suggestion->event_image = 'files/events/' . $suggestion->event_image;
            $suggestion->event_start = date('d M Y \à H\h : i', $suggestion->event_start);
            if (strlen($suggestion->event_desc) > 148){
                $suggestion->event_desc = substr($suggestion->event_desc, 0, 148).'...';
            }
        }
        return $suggestions;
    }
    public function test(Request $request)
    {

        /*$eDao = new EventDao();
        $suggestions = $eDao->get(2);
        dd($suggestions);*/
        $start = ((1575327600000 / 1000) + 3600);
        $start = date('d M Y H\h : i', $start);
        $end = ((1575413999999 / 1000) + 3600);
        $end = date('d M Y H\h : i', $end);
        dd($start, $end);
    }
    public function publishEvent(Request $request)
    {
        if (session()->has('users')){
            $eDao = new EventDao();
            $user = \session('users.id');
            $page = $request->get('page');
            $city = $request->get('city');
            $type = $request->get('type');
            $search = $request->get('search');
            $data = [
                'user' => $user, 'state' => 1,
                'limit' => 3, 'page' => $page,
                'city' => $city, 'type' => $type,
                'search' => $search
            ];
            if ($search != ''){
                $event_publish = $eDao->searchByUser($data);
            }
            else{
                $event_publish = $eDao->getByUser($data);
            }
            //dd ($event_publish);

            foreach ($event_publish as $event){
                $event->event_image = 'files/events/' . $event->event_image;
                $event->event_start = date('d M Y H\h : i', $event->event_start);
                if (strlen($event->event_desc) > 148){
                    $event->event_desc = substr($event->event_desc, 0, 148).'...';
                }
            }

            if ($request->ajax()){
                return response()->json([
                    'events' => $event_publish,
                ]);
            }else{
                //dd($event_publish);
                $cities = (new CityController())->all ($request);
                //$cities->all ();//CityController::all($request);
                $types = (new TypeController())->all($request);
                $class = 'active'; $title = 'Publish Events';
                return view('pages.admin.event.publish-event', compact(['event_publish', 'cities', 'types', 'title', 'class']));
            }
        }
        else {
            return view('errors.404');
        }
    }
    public function waitingEvent(Request $request)
    {
        if (session()->has('users')){
            $eDao = new EventDao();
            $user = \session('users.id');
            $page = $request->get('page');
            $city = $request->get('city');
            $type = $request->get('type');
            $search = $request->get('search');
            $data = [
                'user' => $user, 'state' => 0,
                'limit' => 3, 'page' => $page,
                'city' => $city, 'type' => $type,
                'search' => $search
            ];
            if ($search != ''){
                $event_not_publish = $eDao->searchByUser($data);
            }else{
                $event_not_publish = $eDao->getByUser($data);
            }

            foreach ($event_not_publish as $event){
                $event->event_image = 'files/events/' . $event->event_image;
                $event->event_start = date('d M Y H\h : i', $event->event_start);
                if (strlen($event->event_desc) > 148){
                    $event->event_desc = substr($event->event_desc, 0, 148).'...';
                }
            }
            if ($request->ajax()){
                return response()->json([
                    'events' => $event_not_publish,
                ]);
            }else{
                $cities = (new CityController())->all($request);
                $types = (new TypeController())->all($request);
                $title = 'Waiting Events';
                return view('pages.admin.event.waiting-event', compact(['event_not_publish', 'cities', 'types', 'title']));
            }
        }
        else {
            return view('errors.404');
        }
    }
    public static function countEvent($data = null)
    {
        if (\session('users.profile') != 'admin'){
            $user = \session('users.id');
            $publish = DB::table('events')
                ->where([
                    ['users_id','=',$user],
                    ['event_state','=',1],
                    ['delete','=',false],
                ])
                ->count();

            $waiting = DB::table('events')
                ->where([
                    ['users_id','=',$user],
                    ['event_state','=',0],
                    ['delete','=',false],
                ])
                ->count();
        }
        else {
            if ($data != null){
                $publish = DB::table('events')
                    ->where([
                        ['event_state','=',1],
                        ['delete','=',false],
                        ['event_created','<=',$data['today']],
                        ['event_created','>=',$data['tomorrow']],
                    ])
                    ->count();

                $waiting = DB::table('events')
                    ->where([
                        ['event_state','=',0],
                        ['delete','=',false],
                        ['event_created','<=',$data['today']],
                        ['event_created','>=',$data['tomorrow']],
                    ])
                    ->count();
            }
            else {
                $publish = DB::table('events')
                    ->where([
                        ['event_state','=',1],
                        ['delete','=',false],
                    ])
                    ->count();

                $waiting = DB::table('events')
                    ->where([
                        ['event_state','=',0],
                        ['delete','=',false],
                    ])
                    ->count();
            }
        }
        $data = [
            'publish' => $publish,
            'waiting' => $waiting,
        ];
        //dd($data);
        return $data;
    }

    public function last(Request $request){
        if (\session()->has('users')){
            $eDao = new EventDao();
            $events = $eDao->eLast();
            foreach ($events as $event){
                $event->date = date('d M Y', $event->event_start);
                $event->time = date('H\h : i', $event->event_start);
                $event->event_image = 'files/events/' . $event->event_image;
                $event->event_start = date('d M Y H\h : i', $event->event_start);
                if (strlen($event->event_desc) > 148){
                    $event->event_desc = substr($event->event_desc, 0,    148).'...';
                }
            }
            //dd(strlen('The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.'));
            return response()->json($events);
        }
        else {
            return response()->json("Error !");
        }
    }
    public function stats(Request $request){
        $today = time();
        $tomorrow = $today - 86400;

        if (\session()->has('users')){
            $param = [
                'nature' => 'last24',
                'today' => $today,
                'tomorrow' => $tomorrow,
            ];
            $data[0] = self::countEvent();
            $data[1] = self::countEvent($param);
            $data[2] = $today;
            //$data[3] = $param;
            //dd($data);
            return response()->json($data);
        }
        else {
            return response()->json("Error !");
        }
    }
    public function edit(Request $request)
    {
        $time = $request->get('event-time-start');
        $time0 = strtotime($time); $time1 = date('d\-m\-Y H:i', $time0);
        $date = $request->get('event-date-start');
        $date = strtotime($date); $date1 = date('d\-m\-Y H:i', $date);

        $start = strtotime($time, $date);
        $start1 = date('d\-m\-Y H:i', $start);

        $eDao = new EventDao();
        $event = new Event();
        $event->date = $date;
        $event->start = $start;
        $event->id = $request->get('event-id');
        $event->title = $request->get('event-title');
        $event->desc = $request->get('event-desc');
        $event->type = $request->get('event-select-type');
        $event->city = $request->get('event-select-city');
        $event->location = $request->get('event-location');
        $file = $request->file('event-edit-picture0');
        $file1 = $request->file('event-edit-picture1');
        $file2 = $request->file('event-edit-picture2');
        $file3 = $request->file('event-edit-picture3');
        $data = [];
        if ($file == null){
            $event->file = $request->get('event-edit-alias-picture0');
            //$data['file0'] = $request->get('event-edit-alias-picture0');
        }
        else{
            $data['file0'] = 'event-edit-picture0';
            $event->file = $this->upload($file);
            //$event->file = $this->addedFile($request, null, $data)['picture0'];
        }

        if ($file1 == null && $file2 == null && $file3 == null){
            $data['file1'] = 'event-edit-picture1';
            $data['file2'] = 'event-edit-picture2';
            $data['file3'] = 'event-edit-picture3';
            //$this->addedFile($request, $event->id, $data);
        }
        else{
            $pDao = new PictureDao();
            if ($file1 != null) {
                $url = $this->upload($file1);
                $data['file1'] = $url;  $data['file1id'] = $request->get('id-picture1');
                $values = ['id' => intval($data['file1id']), 'url' => $url];
                //$data['value1'] = $values;
                $pDao->edit($values);
                //$pic1->event = $event->id; $pic1->url = $url; $pDao->add($pic1);
            }
            if ($file2 != null){
                $url = $this->upload($file2);
                $data['file2'] = $url;  $data['file2id'] = $request->get('id-picture2');
                $values = ['id' => intval($data['file2id']), 'url' => $url];
                //$data['value2'] = $values;
                $pDao->edit($values);
                //$pic2->event = $event->id; $pic2->url = $url; $pDao->add($pic2);
            }
            if ($file3 != null){
                $url = $this->upload($file3);
                $data['file3'] = $url;  $data['file3id'] = $request->get('id-picture3');
                $values = ['id' => intval($data['file3id']), 'url' => $url];
                //$data['value3'] = $values;
                $pDao->edit($values);
                //$pic3->event = $event->id; $pic3->url = $url; $pDao->add($pic3);
            }
        }
        $result = $eDao->edit($event);
        if ($result == 1){
            return response()->json([
                //'all' => $event,
                //'data' => $data,
                'result' => 'success',
                'type' => 'success-message',
                'message' => 'Event updated successful !',
            ]);
        }else{
            return response()->json([
                'result' => 'success',
                'message' => 'No successful updates',
            ]);
        }
    }
    public function add(Request $request)
    {
        $validate = $this->eventValidate ($request);
        if ($validate[0]->errors ()->isEmpty () && $validate[1]->errors ()->isEmpty () ){
            $eDao = new EventDao();

            $time = $request->get('event-time-start');
            //$time0 = strtotime($time); //$time1 = date('d\-m\-Y H:i', $time0);
            $date = $request->get('event-date-start');
            $date = strtotime($date); //$date1 = date('d\-m\-Y H:i', $date);

            $start = strtotime($time, $date);
            //$start1 = date('d\-m\-Y H:i', $start);

            $event = new Event();
            $event->date = $date;
            $event->start = $start;
            $event->title = $request->get('event-title');
            $event->desc = $request->get('event-desc');
            $event->type = $request->get('event-select-type');
            $event->city = $request->get('event-select-city');
            $event->location = $request->get('event-location');
            $event->file = $this->addedFile($request, null)['picture0'];
            $event->user = session('users.id');
            $event = $eDao->add($event);
            $option = $this->addedOption($request, $event->id);
            $pictures = $this->addedFile($request, $event->id);
            return response()->json([
                'event' => $event->id,
                'option' => $option,
                'pictures' => $pictures,
                'result' => 'success',
                'title' => 'Information',
                'message' => 'Event add success !',
            ]);
        }
        else {
            return response ()->json ([
                'result' => 'error',
                'title' => 'Error !',
                'class'  => 'is-invalid',
                $validate[0]->errors ()->all (),
                $validate[1]->errors ()->all (), $request->file ('event-picture0')->getSize ()
            ]);
        }
    }
    private function eventValidate(Request $request)
    {
        $validator0 = Validator::make($request->all (), Picture::$rules);
        $validator1 = Validator::make($request->all (), Event::$rules);
        return [
            $validator0,
            $validator1
        ];
    }
    public function added(Request $request)
    {
        $eDao = new EventDao();
        $time = $request->get('time');

        $date = $request->get('date');
        $date = floor($date / 1000) ;//+ 3600;

        $time = strtotime($time, $date);
        //$time = date(' d\-m\-Y H:i', $time);

        $date = date(' d\-m\-Y H:i', $date);
        $event = new Event();
        $event->title = $request->get('title');
        $event->desc = $request->get('desc');
        $event->type = $request->get('type');
        $event->city = $request->get('city');
        $event->location = $request->get('location');
        $event->time = $time;
        $event->start = $time;
        $event->image = $request->get('file');
        $event->user = session('users.id');
        $event = $eDao->add($event);
        return response()->json([
            'result' => 'success',
            'title' => 'Information',
            'message' => 'Event add success !',
            'event' => $event,
        ]);
        //dd($event);
    }
    public function addedFile(Request $request, $event = null, $data = null)
    {
        if ($event == null){
            if ($data == null)
                $file0 = $request->file('event-picture0');
            else
                $file0 = $request->file($data['file0']);
            $picture0 = $this->upload($file0);
            return ['picture0' => $picture0, ];
        }
        else{
            if ($data == null){
                $file1 = $request->file('event-picture1');
                $file2 = $request->file('event-picture2');
                $file3 = $request->file('event-picture3');
            }else{
                $file1 = $request->file($data['file1']);
                $file2 = $request->file($data['file2']);
                $file3 = $request->file($data['file3']);
            }

            $picture1 = $this->upload($file1);
            $picture2 = $this->upload($file2);
            $picture3 = $this->upload($file3);

            $pDao = new PictureDao();
            $pic1 = new Picture(); $pic2 = new Picture(); $pic3 = new Picture();

            $pic1->url = $picture1; $pic1->event = $event; $pDao->add($pic1);

            $pic2->url = $picture2; $pic2->event = $event; $pDao->add($pic2);

            $pic3->url = $picture3; $pic3->event = $event; $pDao->add($pic3);

            return [
                'picture1' => $pic1,
                'picture2' => $pic2,
                'picture3' => $pic3,
            ];
        }
    }
    public function addedOption(Request $request, $event = null, $data = null)
    {
        $oDao = new OptionDao();
        $option = new Option();
        $option->event = $event;
        $option->phone0 = $request->post('event-option-phone1');
        $option->phone1 = $request->post('event-option-phone2');
        $option->phone2 = $request->post('event-option-phone3');
        $option->link0 = $request->post('event-option-facebook');
        $option->link1 = $request->post('event-option-instagram');
        $option->link2 = $request->post('event-option-website');
        $option->link3 = $request->post('event-option-link3');
        $option->link4 = $request->post('event-option-link4');
        return $oDao->add($option);
    }
    public function upload(UploadedFile $file, $dir = 'events')
    {
        //$fileName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $fileNameToStore = md5(Str::random(16)).'-'.time().'.'.$fileExtension;
        $name = $file->move(public_path('/files/'.$dir.'/'), $fileNameToStore);
        //$this->resize($name);
        return $fileNameToStore;
    }

    public function eLast()
    {
        if (\session('users.profile') == 'admin'){
            return DB::table('events')
                ->where([
                    ['event_state','=',1],
                ])
                ->limit(9)
                ->get();
        }
        else {
            return DB::table('events')
                ->where([
                    ['event_state','=',1],
                    ['users_id','=',\session('users.id')],
                ])
                ->limit(9)
                ->get();
        }

    }
    public function msg($input)
    {
        return [
            "$input.required"=> 'Ce champs est obligatoire !',
            "$input.file"=> 'Ce champs doit etre une image !',
            "$input.mines"=> 'Type non autorisé !',
            "$input.size"=> 'Taille dépassée !'
        ];
    }

    public function resize(Request $request) {
        $file = $request->file('file');
        $file = $file->move(public_path('uploads'), $file->getClientOriginalName());
        $format = [100, 200, 300, 400, 500];
        $this->dispatch(new ReseizeJob($file, $format));
        //$file = "C:\Users\EvhaMariel\Documents\laravel\\evenma\public\\files\\events\color2.jpg";
        //return Storage::download($file);
        //new ReseizeJob($file, $format);
        dd($format, $file);
    }


}
