<?php
use Illuminate\Support\Facades\Auth;

function showProfileLink()
{
    $style_display = "";
    $profile_link = "";
    $logout_link = "";

    /* Nếu người dùng đã đăng nhập thì tạo link profile và link logout */
    if (!empty(Auth::user()))
    {   
        $userInfo = Auth::user();

        /* Lấy tên mạng xã hội đăng nhập */
        $username = $userInfo->username;
        $arr_username = explode('_', $username);
        $type_network = $arr_username[0];

        /* Nếu là google thì hiển thị icon google, ngược lại thì hiển thị icon facebook */
        $icon_network = "";
        if($type_network == "gg") $icon_network = "(<i class='fab fa-google'></i>)";
        if ($type_network == "fb") $icon_network = "(<i class='fab fa-facebook'></i>)";
        
        $style_display = "display:none";
        $profile_link = "<li><a href=".url('user')."/".$userInfo->url_key."-".$userInfo->uid."><i class='fas fa-user'>&nbsp;&nbsp;&nbsp;</i>".$userInfo->fullname."&nbsp;&nbsp;".$icon_network."</a></li>";
        $logout_link = "<li><a href=".url('log_out')."><i class='fas fa-sign-out-alt'>&nbsp;&nbsp;&nbsp;</i>".trans('message.sign_out')."</a></li>";
       
    }
     
    $arr_link = [
        'style'=>$style_display,
        'profile_link'=>$profile_link,
        'logout_link'=>$logout_link
    ];
    return $arr_link;
} 

?>