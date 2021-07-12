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
        $userResult = User::where('email', $email)->get();
        if(count($userResult) > 0)
        {
            /* update old password to password default of system */
            $newPassword = rand(0000000000,9999999999);
            $user['password'] = bcrypt($newPassword);
            $update_password = User::where('id', $userResult[0]['id'])->update($user);

            if($update_password) 
            {               
                /* Send email confirm info has change */
                $infoUserSend = [
                                'user' => $userResult[0]->email,
                                'fullname' => $userResult[0]->fullname,
                                'email' => $userResult[0]->email,
                                'username' => $userResult[0]->username,
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