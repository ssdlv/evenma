<?php

namespace App\Http\Controllers\Auth;

use App\Dao\UserDao;
use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Mail\ResetPasswordMail;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        $class = 'login-page sidebar-collapse';
        return view('pages.auth.password.email', compact('class'));
    }
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $user = new User();
        $email = $user->email = $request->email;

        $uDao = new UserDao();
        //$check = $uDao->check($email);
        if ($uDao->check($email) == 1){
            $token = app('auth.password.broker')->createToken($user);

            /*$str_ip = gethostbyname(trim(`hostname -I`));
            $ip = explode(' ',$str_ip);
            $ip = $ip[0];*/

            $details = [
                'email' => $request->get('email'),
                'subject' => 'Reset Password',
                'url' => url("/password.reset.{$token}?email={$email}"),
            ];
            //dd($details);
            $this->dispatch(new SendMailJob($details, 'reset'));
            //Mail::send(new ResetPasswordMail($details));
            $msg = 'Send email';
            $response = 'passwords.sent';
        }
        else {
            $msg = 'Not send email';
            $response = 'passwords.user';
        }
        //dd($check);
        /*return redirect()->route('password-request',compact('msg'))
            ->withErrors($request->all());*/
        /*die();
        dd($request->all(), $details);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );*/

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);

    }

    protected function credentials(Request $request)
    {
        return array_merge(
            $request->only('email'),
            ['confirmation_token' => true]
        );
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
}
