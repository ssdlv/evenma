<?php


    namespace App\Http\Controllers\UI;


    use App\City;
    use App\Dao\CityDao;
    use App\Dao\ElementDao;
    use App\Dao\EventDao;
    use App\Dao\ItemDao;
    use App\Dao\PictureDao;
    use App\Dao\TypeDao;
    use App\Event;
    use App\Http\Controllers\CityController;
    use App\Http\Controllers\Controller;
    use App\Http\Controllers\EventController;
    use App\Http\Controllers\OptionController;
    use App\Http\Controllers\TypeController;
    use App\Http\Controllers\ViewController;
    use App\Services\EvenmaService;
    use App\Type;
    use Illuminate\Http\Request;

    class UIController extends Controller
    {
        public function login()
        {
            $class = 'login-page sidebar-collapse';
            return view('pages.auth.login', compact('class'));
        }
        public function register()
        {
            $class = 'signup-page sidebar-collapse';
            return view('pages.auth.register', compact('class'));
        }
        public function about()
        {
            $class = 'about-us sidebar-collapse';
            return view('pages.others.about', compact('class'));
        }
        public function contact()
        {
            $class = 'contact-page sidebar-collapse';
            return view('pages.others.contact', compact('class'));
        }
        public function conditions()
        {
            $class = '';
            return view('pages.conditions', compact('class'));
        }
        public function profile(Request $request)
        {
            if (session()->has('users')){
                $eDao = new EventDao();
                $user = $request->get('user');
                $data0 = ['user' => $user, 'state' => 0, 'limit' => 3, 'page' => 1, 'city'=>0,'type'=>0];
                $data1 = ['user' => $user, 'state' => 1, 'limit' => 9, 'page' => 1, 'city'=>0,'type'=>0];
                $event_publish = $eDao->getByUser($data1);
                $publish_count = $event_publish->count();
                foreach ($event_publish as $item){
                    $item->event_image = '/files/events/' . $item->event_image;
                }
                $event_not_publish = $eDao->getByUser($data0);
                $not_publish_count = $event_not_publish->count();

                $data = EventController::countEvent();
                if ($request->ajax()){
                    //dd($event_publish);
                    return response()->json([
                        'publish' => $event_publish,
                        'not' => $event_not_publish,
                    ]);
                }else{
                    $title = 'Dashboard';
                    $active = '';
                    $class = 'profile-page sidebar-collapse';
                    return view('pages.admin.dashboard', compact(['event_publish','event_not_publish','publish_count','not_publish_count','data','title','class','active']));
                }
                //dd($event_publish, $event_not_publish);
            }
            else {
                return view('errors.404');
            }

        }
        public function home()
        {
            /*for ($i = 1; $i <= 30; $i++){
                for ($j = 1; $j <= 3; $j++){
                    echo "[$i][$j]</br>";
                }
            }
            die();*/
            /*$eDao = new EventDao();
            $data = null;
            $events = $eDao->getAll($data);
            foreach ($events as $event){
                $event->event_start = date('d M Y H\h : i', $event->event_start);
                if (strlen($event->event_desc) > 50){
                    $event->event_desc = substr($event->event_desc, 0, 50).'...';
                }
            }
            dd($events);*/
            $events  = null;
            $class = 'index-page sidebar-collapse';
            return view('pages.cli.home', compact('events', 'class'));
            //return view('welcome');
        }
        public function details(Request $request)
        {
            $eDao = new EventDao();
            $pDao = new PictureDao();
            $elDao = new ElementDao();
            $iDao = new ItemDao();
            //$event = $eDao->get($request->get('event'));
            //var_dump ($event);
            $event = Event::find($request->get('event'));
            $event0 = Event::find($request->get('event'));
            //dd ($event0);
            /*$event0->type = $event0->type;
            $event0->pictures = $event0->pictures;
            dd ($event, $event0->options);*/

            $event->time = date('h\h : i', $event->event_start);
            $event->date = date('Y-m-d', $event->event_start);
            $event->start = date('d M Y \à H\h : i', $event->event_start);
            $event->picture = 'files/events/' . $event->event_image;
            ##Elements
            $elements = $event->elements;//$elDao->getByEvent ($event->id);
            foreach ($elements as $element){
                $element->element_date = date('d-m-Y', $element->element_date);
                ##Load Items
                $items = $element->items;//$iDao->getByElement ($element->id);
                foreach ($items as $item){
                    $item->item_start = date('h\h : i', $item->item_start);
                    $item->item_end = date('h\h : i', $item->item_end);
                }
                $element->items = $items;
            }
            $event->elements = $elements;
            ##Pictures
            $pictures = $event->pictures;//$pDao->getByEvent($event[0]->event_id);
            foreach ($pictures as $picture){
                $picture->picture = 'files/events/' . $picture->picture_url;
            }
            $event->pictures = $pictures;
            ##Options
            $event->option = $event->options;//(new OptionController)->get(null,$event[0]->event_id);
            //dd($event);
            ##Suggestions
            $data = [
                'limit' => 30,
                'type' => $event->types_id,
                'city' => $event->cities_id,
                'current' => $event->id,
            ];
            //dd ($event, $data);
            $suggestions = EventController::suggestion($data);
            dd ($suggestions);
            $class = 'product-page sidebar-collapse';
            if ($request->ajax()){
                return response()->json(['event','class','suggestions']);
            }
            else{
                return view('pages.cli.details', compact(['event','class','suggestions']));
            }

        }
        public function add(Request $request)
        {
            $page = $request->get('page');
            if (!session()->has('users')){
                $class = 'login-page sidebar-collapse';
                return view('pages.auth.login', compact('class'));
            }else{
                if ($page == 'add'){
                    $class = 'product-page sidebar-collapse';
                    return view('pages.admin.event.add', compact('class'));
                }else{
                    $title = 'Add Event';
                    $active = '';
                    $cities = CityController::all($request);
                    $types = TypeController::all($request);
                    //dd($types);
                    return view('pages.admin.event.added', compact(['title','cities','types','active']));
                }
            }
        }
        public function edit(Request $request)
        {
            if (!session()->has('users')){
                $class = 'login-page sidebar-collapse';
                return view('pages.login', compact('class'));
            }else{
                $eDao = new EventDao();
                $pDao = new PictureDao();
                $eService = new EvenmaService();
                $id = $request->get('id');
                $result = $eDao->get($id);
                $result->date = date('Y-m-d', $result[0]->event_start);
                $result->time = date('h:m', $result[0]->event_start);
                //dd($result);
                $pictures = $pDao->getByEvent($id);
                foreach ($pictures as $picture)
                {
                    $picture->picture_url_base64 = $eService->encodeBase64($picture->picture_url);
                }
                $result[0]->pictures = $pictures;
                $result[0]->picture0 = $eService->encodeBase64($result[0]->event_image);
                //dd($result[0]);
                $title = 'Edit Event';
                $cities = CityController::all($request);
                $types = TypeController::all($request);
                //dd($types);
                return view('pages.admin.event.edit', compact(['title','cities','types','result']));
            }
        }
        public function news()
        {
            $class = '';
            return view('pages.home', compact('class'));
        }
        public function city()
        {
            if (session()->has('users') && session('users.profile') == 'admin'){
                $cDao = new CityDao();
                $cities = $cDao->getAll();
                foreach ($cities as $city){
                    $city->city_created = date('d M Y H\h : i', $city->city_created);
                    $city->city_updated = date('d M Y H\h : i', $city->city_updated);
                    $city->city_using = Event::all()
                        ->where('delete','=',0)
                        ->where('event_state','=',1)
                        ->where('cities_id','=', $city->id)
                        ->count();
                }
                $title = 'Cities'; $active = 'active';
                return view('pages.admin.city', compact(['cities', 'title', 'active']));
            }
            else {
                return view('errors.404');
            }
        }
        public function type()
        {
            if (session()->has('users') && session('users.profile') == 'admin'){
                $tDao = new TypeDao();
                $types = $tDao->getAll();
                foreach ($types as $type){
                    $type->type_created = date('d M Y H\h : i', $type->type_created);
                    $type->type_updated = date('d M Y H\h : i', $type->type_updated);
                    $type->type_using = Event::all()
                        ->where('delete','=',0)
                        ->where('event_state','=',1)
                        ->where('types_id','=', $type->id)
                        ->count();
                }
                $title = 'Types'; $active = 'active';
                return view('pages.admin.type', compact(['types', 'title', 'active']));
            }
            else {
                return view('errors.404');
            }

        }
    }
