<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSigninUser;
use App\Mail\EmailResetPassword;

class SendMailController extends Controller
{
    /* Function send email when user create new accout with facebook or google */
    function sendMailLogin($email_received, $info_user)
    {
        $array_data = [
                        'name' => $info_user->user['name'],
                        'email' => $info_user->user['email']
                    ];
        /* Send email with send() function of Mail object */
        $sending_mail = Mail::to($email_received)->send(new EmailSigninUser($array_data));
    }

    function sendMailResetPassword($email_received, $info_user)
    {
        /* Send email with send() function of Mail object */
        $sending_mail = Mail::to($email_received)->send(new EmailResetPassword($info_user));
    }
}
