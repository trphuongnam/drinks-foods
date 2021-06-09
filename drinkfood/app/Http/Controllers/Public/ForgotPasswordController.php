<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Public\SendMailController;
use Illuminate\Support\Facades\Lang;
use App\thuvien_xuly\Strings;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('public.pages.forgot_password');
    }

    public function store(Request $request)
    {
        $sendMail = new SendMailController;

        /* Check email of user with info of users table */
        $checkEmail = User::where('email', $request->email)->get();
        if(count($checkEmail) > 0)
        {
            /* update old password to password default of system */
            $newPassword = rand(0000000000,9999999999);
            $user = $request->query();
            $user['password'] = bcrypt($newPassword);
            $update_password = User::where('id', $checkEmail[0]['id'])->update($user);

            if($update_password) {
                
                /* Send email confirm info has change */
                $infoUserSend = [
                                'email' => $checkEmail[0]->email,
                                'fullname' => $checkEmail[0]->fullname,
                                'username' => $checkEmail[0]->username,
                                'password' => $newPassword
                            ];
                
                $sendingMail = $sendMail->sendMailResetPassword($request->email, $infoUserSend);
                $request->session()->flash('reset_pass_success', trans('message.reset_pass_success'));
                return url('/sign_in');              
            }
        }else {
            $request->session()->flash('err_check_mail', trans('message.err_check_mail'));
            return url('/forgot_password');
        }   
    }
}
