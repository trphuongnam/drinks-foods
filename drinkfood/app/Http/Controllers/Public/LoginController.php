<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\LibraryStrings\Strings;
use Illuminate\Support\Str;
use App\Services\LoginService;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $send_mail_controller;
    function __construct()
    {
        
    }

    public function index()
    {
        return view('public.pages.login');
    }

    /* Hàm kiểm tra người dùng đăng nhập */
    public function store(Request $request)
    {
        $check_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($check_login == true)
        {
            return redirect()->route('index');
        }else{
            $request->session()->flash('err_sign_in', trans('message.err_sign_in'));
            return redirect()->route('sign_in.index')->withInput();
        }
    }
    /* End: public function store(Request $request) */


    /* function redirect facebook login page */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /* End: public function redirectToFacebook() */

    /* function return user infor */
    function facebookCallback(LoginService $loginFacebook)
    {
        return $loginFacebook->handleFacebookCallback();
    }
    /* End: public function handleFacebookCallback() */

    /* Function redirect user to regist page of google */
    public function redirectToGoogle()
	{
		return Socialite::driver('google')->redirect();
	}
    /* End: public function redirectToGoogle() */

    /* Function handling login with google */
    public function googleCallback(LoginService $loginGoogle)
    {
        return $loginGoogle->handleGoogleCallback();
    }

    /* Function save user when login if account do not exist in database*/
    public function createUser($user_info)
    {
        $user = new User;
        $strings = new Strings;
        
        /* Check current user login with facebook or google */
        $infoUser = null;
        if(isset($user_info->user['sub']))
        {
            $infoUser['username'] = "gg_".$user_info->user['id'];
            $infoUser['google_id'] = $user_info->user['id'];
            $infoUser['fullname'] = $user_info->user['name'];
            $infoUser['email'] = $user_info->user['email'];
            $infoUser['avatar'] = $user_info->user['picture'];
            $infoUser['url_key'] = Str::slug($user_info->user['name']);
            $infoUser['uid'] = $strings->rand_string();

        }
        else{

            $infoUser['username'] = "fb_".$user_info->user['id'];
            $infoUser['fb_id'] = $user_info->user['id'];
            $infoUser['fullname'] = $user_info->user['name'];
            $infoUser['email'] = $user_info->user['email'];
            $infoUser['url_key'] = Str::slug($user_info->user['name']);
            $infoUser['uid'] = $strings->rand_string();
        }
        /* End: if(isset($user_info->user['sub'])) */      

        /* Save info user to users table */
        $save_user_info = $user::create($infoUser);
        return $save_user_info;        
    }
    /* End: public function createUser($fb_user) */
    
    /* Function sign out user */
    public function sign_out()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    /* End: public function sign_out() */
}