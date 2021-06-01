<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{

    /* Function show info current user login */
    public function index()
    {
        /*If users not login redirect sign in page*/
        if(Auth::check()) return view('public.pages.profile_detail')->with('userInfo', Auth::user());   
        else return redirect()->route('sign_in.index');  
    }
    /* End: public function show($paramUrl) */

    /* Function show info user in form */
    public function edit($uid_user)
    {
        /*If users not login redirect sign in page*/
        if(Auth::check()) return view('public.pages.profile_edit')->with('userInfo', Auth::user());   
        else return redirect()->route('sign_in.index');  
        
    }

    /* Function update profile user */
    public function update(Request $request, $id)
    {
        //
    }

}
