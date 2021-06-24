<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\LibraryStrings\Strings;
use Illuminate\Support\Str;

class RegistController extends Controller
{
    public function __construct()
    {
        $this->strings = new Strings;
    }
    
    public function index()
    {
        return view('public.pages.regist');
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'unique:users,email',
            'phone' => 'unique:users,phone',
            'username' => 'unique:users,username'
        ];

        $messages = [
            'email.unique' => __('message.email_exist'),
            'phone.unique' => __('message.phone_exist'),
            'username.unique' => __('message.username_exist')
        ];
        $validate = $request->validate($rules, $messages);

        if($validate == true)
        {
            $infoRegistUser = $request->except(['re_password']);
            $infoRegistUser['password'] = bcrypt($request->password);
            $infoRegistUser['uid'] = $this->strings->rand_string();
            $infoRegistUser['url_key'] = Str::slug($request->fullname);
    
            $registUser = User::create($infoRegistUser);
            if($registUser)
            {
                $request->session()->flash('regist_success', trans_choice('message.regist_user', 1));
                return redirect()->route('sign_in.index');
            }else{
                $request->session()->flash('regist_errors', trans_choice('message.regist_user', 2));
                return redirect()->route('regist.index')->withInput();
            }
        }
    }
}