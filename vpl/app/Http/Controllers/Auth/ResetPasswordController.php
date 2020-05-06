<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    function current_password_check(Request $req)
    {
        $user_id = Auth::guard('web')->user()->id;
        $user_info = User::where('id', $user_id)->first();     

        $current_password = $req->current_password;

        if($user_info->password == md5($current_password))
        {
          return 'true';
        }
        else {
          return 'false';
        }
    }

    function change_password(Request $req)
    {
      $id = Auth::guard('web')->user()->id;
      $user_info = User::where('id', $id)->first();

      if($user_info->password == md5($req->current_password))
      {
        if((md5($req->new_password != $user_info->password) && ($req->new_password == $req->repeat_password)))
        {
          $to_name = Auth::user()->first_name;
          $to_email = Auth::user()->email;

          $data = array('name'=> $to_name, "email" => $to_email);

          Mail::send('auth.email.password-change', $data, function($message) use ($to_name, $to_email) 
          {
              $message->to($to_email, $to_name)->subject('Password Changed!');

              $message->from('govindaisalovemachine@gmail.com','The Love Machine');
          });
          User::where('id', $id)->update(['password' => md5($req->repeat_password)]);
          Auth::logout();
          Auth::guard("web")->logout();
          return Redirect('/login')->with('info', 'Password Has Been Updated, Login Again Please!');
        }
      }
    }
}
