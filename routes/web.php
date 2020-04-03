<?php

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

Route::get('/welcome', function (){
    $class = 'index-page sidebar-collapse';
    return view ('welcome',compact ('class'));
});
Route::get('/', 'UI\UIController@home')->name ('home');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

//UI
Route::get('/types', 'UI\UIController@type')->name('type');
Route::get('/cities', 'UI\UIController@city')->name('city');
Route::get('/login', 'UI\UIController@login')->name('login');
Route::get('/register', 'UI\UIController@register')->name('register');
Route::get('/about', 'UI\UIController@about')->name('about');
Route::get('/contact', 'UI\UIController@contact')->name('contact');
Route::get('/profile', 'UI\UIController@profile')->name('profile');
Route::get('/details', 'UI\UIController@details')->name('details');
Route::get('/add', 'UI\UIController@add')->name('add');
Route::get('/edit', 'UI\UIController@edit')->name('edit');
Route::get('/ui/edit/init', 'UI\UIController@edit');
Route::get('/home', 'UI\UIController@home');
Route::get('/ui/conditions/init', 'UI\UIController@conditions');

//AUTH
Route::get('password.reset.{token}', 'Auth\ResetPasswordController@showResetForm')->name('password-reset');
Route::get('password.reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password-request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password-reset');
Route::post('/auth/login', 'UserController@login');
Route::get('/auth/logout', 'UserController@logout');

Route::post('/auth/register', 'UserController@register');
//EVENTS
Route::get('/events/all', 'EventController@all');
Route::get('/events/get', 'EventController@get');
Route::post('/events/delete', 'EventController@delete');
Route::post('/events/publish', 'EventController@publish');
Route::post('/events/add', 'EventController@add');
Route::post('/events/edit', 'EventController@edit');
Route::get('/events/publish/last', 'EventController@last');
Route::get('/events/stats', 'EventController@stats');
//Views
Route::get('/views/add', 'ViewController@add');

//Cities
Route::get('/cities/get','CityController@get');
Route::get('/cities/all','CityController@all');
Route::post('/cities/add','CityController@add');
Route::post('/cities/edit','CityController@edit');
Route::get('/cities/delete','CityController@delete');

//Types
Route::get('/types/get','TypeController@get');
Route::get('/types/all','TypeController@all');
Route::post('/types/add','TypeController@add');
Route::post('/types/edit','TypeController@edit');
Route::get('/types/delete','TypeController@delete');

//Contact
Route::post('/contact/add','ContactController@add')->name('contact-add');
//About
Route::get('/about/team/all','TeamController@all')->name('team-all');
Route::get('/about/team/active','TeamController@active')->name('team-active');
//E-Mails
Route::get('/email',function (){
    return view ('mails.confirm-mail')
        ->with ('title','Title')
        ->with ('url', env ('APP_URL'));
});
//Tasks
Route::get('/tasks/run','TaskController@run');
//Tests
Route::get('/test1','EventController@test');

Route::get('count', 'EventController@countEvent');

//ADMIN
Route::get('/publishEvent','EventController@publishEvent')->name('publishEvent');
Route::get('/waitingEvent','EventController@waitingEvent')->name('waitingEvent');
