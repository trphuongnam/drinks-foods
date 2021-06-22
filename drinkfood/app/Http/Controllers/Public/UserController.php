<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UploadFileService;
use App\Http\Controllers\Public\SendMailController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdatePasswordRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->sendMailController = new SendMailController;   
    }
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
    public function update(Request $request, UploadFileService $uploadFileService, $uid_user)
    {
        $userInfo = $request->except(['email', 'showusername', 'showpassword', 'newpassword', 'repassword','_token', '_method']);
        
        /* Check has file upload */
        if($request->hasFile('avatar'))
        { 
            /* Create path save file */
            $pathSaveFile = public_path("uploads/images/users");

            $fileName = $uploadFileService->UploadAvatar($request, $request->file('avatar'), $pathSaveFile); 
            $userInfo['avatar'] = $fileName;
        }
        
        $updateInfo = User::where("uid", $uid_user)->update($userInfo);
        
        if($updateInfo) return back();
        else return redirect()->back()->with("err_update", _('message.err_update'));
    }

    public function editPassword(UpdatePasswordRequest $request)
    {
        $newPassword = $request->only('password');
        $newPassword['password'] = bcrypt($request->password);
        $updatePassword = User::where('id', Auth::user()->id)->update($newPassword);     
        
        /* Create array contain info user */
        $information = [
            'fullname' => Auth::user()->fullname,
            'email' => Auth::user()->email,
            'password' => $request->password
        ];
        
        if($updatePassword) {
            try {
                $this->sendMailController->sendMailUpdatePassword(Auth::user()->email, $information);
                Auth::logout();
                return redirect()->route('sign_in.index')->with('reset_pass_success', __('message.reset_pass_success'));
            } catch (\Throwable $th) {
                Session::put('resend_email_'.Auth::user()->uid, $information);
                Auth::logout();
                return redirect()->route('sign_in.index')->with('reset_pass_success', __('message.reset_pass_success'));
            }   
        }else return redirect()->route('user.index')->with("err_update", _('message.err_update'));
    }
}