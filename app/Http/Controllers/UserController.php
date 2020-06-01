<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use App\Dao\UserDao;
use App\Mail\ConfirmMail;
use App\Notifications\RegisterNotify;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $uDao = new UserDao();
        $email = $request->get('email');
        $validate = $this->validator($request->all  (),'register');
        if ($validate->passes()){
            $check = $uDao->check($email);
            if ($check != 0){
                return response()->json([
                    'result' => 'error',
                    'title' => 'Error',
                    'message' => 'This email is already used. Try another email address!',
                ]);
            }else{
                event(new Registered($user = $uDao->register($request->all())));
                //$user->notify(new RegisterNotify());
                $details = [
                    'email' => $user->email,
                    'subject' => 'Verify your email address',
                    'url' => url("confirm/{$user->id}/".urldecode($user->confirmation_token)),
                ];
                //Mail::send(new ConfirmMail($details));
                $this->confirm_mail($details);
                return response()->json([
                    'data' => $details,
                    'result' => 'success',
                    'page' => 'home',
                    'title' => 'Success',
                    'message' => 'Welcome to Evenma',
                    'info' => 'We have sent you a confirmation email to activate your account.',
                ]);
            }
        }else{
            return response()->json([
                'result' => 'warning',
                'title' => 'Information',
                'message' => 'Please validate the identification constraints !',
            ]);
        }
    }
    public function login(Request $request)
    {
        $uDao = new UserDao();
        $email = $request->get('email');
        $password = $request->get('password');
        $validate = $this->validator($request->all(),'login');
        if ($validate->passes()){
            $result = $uDao->login($email,$password);
            return response()->json([sha1($password), sha1($password)]);
            if (sizeof($result) == 1){
                return response()->json([
                    'result' => 'success',
                    'page' => 'home',
                    'title' => 'Success',
                    'message' => 'Welcome to Evenma',
                ]);
            }else{
                return response()->json([
                    'result' => 'error',
                    'title' => 'Error',
                    'message' => 'Invalid identification information',
                ]);
            }
        }else{
            return response()->json([
                'result' => 'warning',
                'title' => 'Information',
                'message' => 'Please validate the identification constraints !',
            ]);
        }

        //
        //$request->session()->regenerate();
        /*$request->session()->put('users.state', 'null');
        \session([
            'users.id' => $result{0}->id,
            'users.state' => true,
            'users.name' => $result{0}->name,
            'users.email' => $result{0}->email,
            'users.profile' => $result{0}->profile,
        ]);*/
    }
    public function logout(Request $request)
    {
        Session::flush();
        return response()->json([
            'result' => 'success'
        ]);
    }
    protected function validator(array $data, $nature = 'login')
    {
        if ($nature == 'login'){
            return Validator::make($data, [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6'],
            ]);
        }else{
            return Validator::make($data, [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'phone' => ['required', 'string', 'min:9'],
                'name' => ['required', 'string', 'min:3'],
            ]);
        }
    }
    protected function confirm_mail($details)
    {
        $this->dispatch(new SendMailJob($details, 'confirm'));
        /*Mail::send(new ConfirmMail($details));*/
    }
}
