<?php

namespace App\Services;
use PhpParser\Builder\Class_; 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Public\SendMailController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\Public\LoginController;
use Illuminate\Http\Request;

Class LoginService
{
    public function __construct()
    {
        $this->send_mail_regist = new SendMailController();
        $this->loginController = new LoginController();
    }

    /* Function callback Google */
    public function handleFacebookCallback()
    {
        try {
            
            $fb_user = Socialite::driver('facebook')->user();
            $UserData = User::where('fb_id', $fb_user->id)->get()->toArray();

            /* If there is no user information, call the createUser function to create a new user
                Otherwise, log in */
            if($UserData == null)
            {
                /* Check if the email already exists */
                $userEmail = User::where('email', $fb_user->user['email'])->get()->toArray();
                if($userEmail == null)
                {
                    $save_user = $this->loginController->createUser($fb_user);
                    
                    /* If create user success, redirect to home page */
                    if($save_user == true) 
                    {
                        $lastUser = User::orderBy('id', 'DESC')->first();
                        Auth::loginUsingId($lastUser->id);

                        /* Call function send email */
                        $this->send_mail_regist->sendMailLogin($fb_user->user['email'], $fb_user);
                        return redirect()->route('index')->with(['send_mail_success', trans('message.send_mail_success')]);
                       
                    }else return redirect()->route('sign_in.index');
                    /* End: if($save_user == true)  */

                }else{
                    return redirect()->route('sign_in.index')->with('msg_sign_in', trans('message.msg_sign_in'));
                }
                /* End: if(empty($userEmail)) */

            }else{
                if($UserData[0]['status'] == 1)
                {
                    if(!empty(Auth::loginUsingId($UserData[0]['id'])))
                    {
                        return redirect()->route('index');
                    }   
                    else return redirect()->route('sign_in.index');
                }else{
                    return redirect()->route('sign_in.index')->with('account_blocked', trans('message.account_blocked'));
                }
                
            }  
            /* End: if($UserData == null) */  
            
        } catch (\Exception $e) {
            session()->flash('err_exception', trans('message.err_exception'));
            return redirect()->route('sign_in.index');
        }
    }
    /* End: public function handleFacebookCallback() */

    /* Function callback Google */
    public function handleGoogleCallback()
    {
        try {

            $google_user = Socialite::driver('google')->user();
            $UserGoogleData = User::where('google_id', $google_user->id)->get()->toArray();

            if($UserGoogleData == null)
            {
                /* Check email of current user exists or not */
                $userEmail = User::where('email', $google_user->user['email'])->get()->toArray();
                if($userEmail == null)
                {
                    $save_user = $this->loginController->createUser($google_user);
                
                    /* If create success account of current user, redirect to home page*/
                    if($save_user == true) 
                    {
                        $lastUser = User::orderBy('id', 'DESC')->first();
                        Auth::loginUsingId($lastUser->id);

                        /* Call function send email */
                        $this->send_mail_regist->sendMailLogin($google_user->user['email'], $google_user);
                        return redirect()->route('index')->with(['send_mail_success', trans('message.send_mail_success')]);
                    }
                    else 
                    {
                        return redirect()->route('sign_in.index');
                    }
                    /* End: if($save_user == true)  */

                }else{
                    return redirect()->route('sign_in.index')->with('msg_sign_in', trans('message.msg_sign_in'));
                }
                /* End: if(empty($userEmail)) */

            }else{
                /* Check if exists info account of current user and status == 1, redirect to home page*/
                if($UserGoogleData[0]['status'] == 1)
                {
                    if(!empty(Auth::loginUsingId($UserGoogleData[0]['id'])))
                    {
                        return redirect()->route('index');
                    }   
                    else return redirect()->route('sign_in.index');
                }else{
                    return redirect()->route('sign_in.index')->with('account_blocked', trans('message.account_blocked'));
                }
                
                /* End: if(!empty(Auth::loginUsingId($UserGoogleData[0]['id']))) */

            }
            /* End:if($UserGoogleData == null) */    
            
        } catch (\Exception $e) {
            session()->flash('err_exception', trans('message.err_exception'));
            return redirect()->route('sign_in.index');
        }
    }
    /* End: public function handleGoogleCallback() */

}

?>