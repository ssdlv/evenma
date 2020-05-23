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
    use App\Http\Middleware\AuthEvenma;
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
                //dd($event_publish);
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
            $events  = null;
            $class = 'index-page sidebar-collapse';
            return view('pages.cli.home', compact('events', 'class'));
        }
        public function details(Request $request)
        {
            $event = Event::find($request->get('event'));

            $event->time = date('h\h : i', $event->event_start);
            $event->date = date('Y-m-d', $event->event_start);
            $event->start = date('d M Y \à H\h : i', $event->event_start);
            $event->picture = 'files/events/' . $event->event_image;
            ##Elements
            $elements = $event->elements;
            foreach ($elements as $element){
                $element->element_date = date('d-m-Y', $element->element_date);
                ##Load Items
                $items = $element->items;
                foreach ($items as $item){
                    $item->item_start = date('h\h : i', $item->item_start);
                    $item->item_end = date('h\h : i', $item->item_end);
                }
                $element->items = $items;
            }
            $event->elements = $elements;
            ##Pictures
            $pictures = $event->pictures;
            foreach ($pictures as $picture){
                $picture->picture = 'files/events/' . $picture->picture_url;
            }
            $event->pictures = $pictures;
            ##Options
            $event->option = $event->options;
            ##Suggestions
            $data = [
                'limit' => 3,
                'type' => $event->types_id,
                'city' => $event->cities_id,
                'current' => $event->id,
            ];
            $suggestions = EventController::suggestion($data);
            //dd ($event->type);
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
                    $cities = (new \App\Http\Controllers\CityController)->all($request);
                    $types = (new \App\Http\Controllers\TypeController)->all($request);
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
                $id = $request->get('event');
                $result = $eDao->get($id);
                $result->date = date('Y-m-d', $result[0]->event_start);
                $result->time = date('h:m', $result[0]->event_start);
                $result[0]->event_start = date('d M Y H\h : i', $result[0]->event_start);
                //dd($result);
                $pictures = $pDao->getByEvent($id);
                foreach ($pictures as $picture)
                {
                    $picture->picture_url_base64 = $eService->encodeBase64($picture->picture_url);
                }
                $result[0]->pictures = $pictures;
                $result[0]->picture0 = $eService->encodeBase64($result[0]->event_image);
                //dd($result);
                $title = 'Edit Event';
                $cities = (new CityController())->all($request);
                $types = (new TypeController())->all($request);
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
                $cities = CityController::list ();
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
                $types = TypeController::list ();
                $title = 'Types'; $active = 'active';
                return view('pages.admin.type', compact(['types', 'title', 'active']));
            }
            else {
                return view('errors.404');
            }

        }
    }
