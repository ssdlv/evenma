<?php

use App\Category;
use App\Event;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UI\UIController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthEvenma;
use App\Product;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('cycles/get',[CycleController::class,'get']);
//'StripeController@index'
Route::get('/stripe', [StripeController::class, 'index'])->name ('stripe.index');
Route::post('/stripe', 'StripeController@payment')->name ('stripe.payment');
Route::get('/stripe.plan.create', 'StripeController@plan')->name ('stripe.plan.create');
Route::get('/stripe.plan.subscription', 'StripeController@subscription')->name ('stripe.plan.subscription');

Route::get('/welcome', function (){
    //dd (session ('users.profile'));
    $class = 'index-page sidebar-collapse';
    return view ('welcome',compact ('class'));
})->middleware ('auth.admin');

Route::get('/', [UIController::class, 'home'])->name ('home');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

//UI
Route::middleware([AuthEvenma::class])->group(function () {
    Route::get('/types', [UIController::class, 'type'])
        ->name('type')->middleware ('auth.admin');
    Route::get('/cities', [UIController::class, 'city'])
        ->name('city')->middleware ('auth.admin');
    Route::get('/profile', [UIController::class, 'profile'])->name('profile');
    Route::get('/add', [UIController::class, 'add'])->name('add');
    Route::get('/edit', [UIController::class, 'edit'])->name('edit');
    Route::get('/ui/edit/init', [UIController::class, 'edit']);
});

    //->middleware ('auth.app');

Route::get('/login', [UIController::class, 'login'])->name('login');
Route::get('/register', [UIController::class, 'register'])->name('register');
Route::get('/about', [UIController::class, 'about'])->name('about');
Route::get('/contact', [UIController::class, 'contact'])->name('contact');

Route::get('/details/{id}', [UIController::class, 'details'])->name('details');

Route::get('/home', [UIController::class, 'home']);
Route::get('/ui/conditions/init', [UIController::class, 'conditions']);

//AUTH
Route::get('password.reset.{token}', 'Auth\ResetPasswordController@showResetForm')->name('password-reset');
Route::get('password.reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password-request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password-reset');
Route::post('/auth/login', 'UserController@login');
Route::get('/auth/logout', 'UserController@logout');

Route::post('/auth/register', [UserController::class,'register']);
//EVENTS
Route::get('/events/all', [EventController::class, 'all']);
Route::get('/events/get', [EventController::class, 'get']);

Route::middleware([AuthEvenma::class])->group(function () {
    Route::post('/events/delete', 'EventController@delete')->name ('event.delete')->middleware ('auth.admin');
    Route::post('/events/publish', 'EventController@publish')->name ('event.publish')->middleware ('auth.admin');
    Route::post('/events/add', 'EventController@add')->name ('event.add')->middleware ('auth.admin');
    Route::post('/events/edit', 'EventController@edit')->name ('event.edit')->middleware ('auth.admin');
    Route::get('/events/publish/last', 'EventController@last')->name ('event.last');
    Route::get('/events/stats', 'EventController@stats')->name ('event.stats')->middleware ('auth.admin');

    Route::get('/views/add', 'ViewController@add')->name ('view.add')->middleware ('auth.admin');
});
//Views


//Cities
Route::get('/cities/get','CityController@get')->name ('city.get');
Route::get('/cities/all','CityController@all')->name ('city.all');
Route::middleware([AuthEvenma::class])->group(function () {
    Route::post('/cities/add','CityController@add')->name ('city.add')->middleware ('auth.admin');
    Route::post('/cities/edit','CityController@edit')->name ('city.edit')->middleware ('auth.admin');
    Route::get('/cities/delete','CityController@delete')->name ('city.delete')->middleware ('auth.admin');
});

Route::middleware([AuthEvenma::class])->group(function () {
    Route::get('/types/get','TypeController@get')->name ('type.get');
    Route::post('/types/add','TypeController@add')->name ('type.add')->middleware ('auth.admin');
    Route::post('/types/edit','TypeController@edit')->name ('type.edit')->middleware ('auth.admin');
    Route::get('/types/delete','TypeController@delete')->name ('type.delete')->middleware ('auth.admin');
});
//Types
Route::get('/types/all','TypeController@all');

//Contact
Route::post('/contact/add','ContactController@add')->name('contact-add');
//About
Route::get('/about/team/all','TeamController@all')->name('team-all');
Route::get('/about/team/active','TeamController@active')->name('team-active');
//E-Mails
Route::get('/email',function (){
    $category = new Category();
    //$category->name = "SmartPhone";
    $category->setAttribute ('name','Laptop');
    //$category->save ();

    $product = new Product();
    $product->name = "Iphone 8plus";
    $product->price = 1200.00;
    $product->category_id = 1;
    $product->save ();
    dd ($product);
    $event = Event::find(1);

    $type = Type::find(1);
    dd ($event->type, $type->event);
    /*return view ('mails.confirm-mail')
        ->with ('title','Title')
        ->with ('url', env ('APP_URL'));*/
});
//Tasks
Route::get('/tasks/run','TaskController@run');
//Tests
Route::get('/test1','EventController@test');

Route::get('count', 'EventController@countEvent');

//ADMIN
Route::middleware([AuthEvenma::class])->group(function () {
    Route::get('/publishEvent','EventController@publishEvent')->name('publishEvent');
    Route::get('/waitingEvent','EventController@waitingEvent')->name('waitingEvent');
});


Route::get ('twilio', 'TwilioController@send')->name ('twilio');

Route::get('/resize','InterventionImageController@create')->name('resize');
Route::post('/resize','InterventionImageController@store')->name('resize');

Route::get('/phpinfo', function() {
    return phpinfo();
});

Route::get('/promote/{id}', [UIController::class, 'promote']);
Route::get('/checkout', function() {
    //dd($id);
    return view('pages.others.checkout');
    //return phpinfo();
});
