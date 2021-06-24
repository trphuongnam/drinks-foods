<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ResetPasswordService;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('public.pages.forgot_password');
    }

    public function store(Request $request, ResetPasswordService $resetPasswordService)
    {
        $resultResetPassword = $resetPasswordService->resetPassword($request, $request->email);
        if($resultResetPassword['status'] == true)
        {
            $request->session()->flash('reset_pass_success', trans('message.reset_pass_success'));
            return redirect()->route('sign_in.index'); 
        }
        
        if($resultResetPassword['status'] == false && $resultResetPassword['msg'] == 'err_check_mail')
        {
            $request->session()->flash('err_check_mail', trans('message.err_check_mail'));
            return redirect()->route('forgot_password.index');
        }       

        if($resultResetPassword['status'] == false && $resultResetPassword['msg'] == 'send_mail_error')
        {
            $request->session()->flash('send_mail_error', trans('message.send_mail_error'));
            return redirect()->route('forgot_password.index');
        }         
    }
}
