<?php
namespace App\Services;
use App\Models\User;
use App\Http\Controllers\Public\SendMailController;

class ResetPasswordService
{
    function resetPassword($request, $email)
    {
        $sendMail = new SendMailController;

        /* Check email of user with info of users table */
        $checkEmail = User::where('email', $email)->get();
        if(count($checkEmail) > 0)
        {
            /* update old password to password default of system */
            $newPassword = rand(0000000000,9999999999);
            $user = $request->query();
            $user['password'] = bcrypt($newPassword);
            $update_password = User::where('id', $checkEmail[0]['id'])->update($user);

            if($update_password) 
            {               
                /* Send email confirm info has change */
                $infoUserSend = [
                                'email' => $checkEmail[0]->email,
                                'fullname' => $checkEmail[0]->fullname,
                                'username' => $checkEmail[0]->username,
                                'password' => $newPassword
                            ];
                
                $sendingMail = $sendMail->sendMailResetPassword($request->email, $infoUserSend);
                if($sendingMail == null) return ['status'=>true];
                else return ['status'=>false, 'msg'=>'send_mail_error'];
            }
        }else {
            return ['status'=>false, 'msg'=>'err_check_mail'];
        }   
    }
}

?>