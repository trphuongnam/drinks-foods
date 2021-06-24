<?php

/* Function check avatar user*/
function checkUserAvatar($avatar, $gender)
{
    if($avatar != "") $strAvatar = asset("/uploads/images/users/$avatar");
    else
    {
        if($gender == 0) $strAvatar = asset('images/icons/user_unknown.png');
        elseif($gender == 1) $strAvatar = asset('images/icons/user_men.png');
        else $strAvatar = asset('images/icons/user_women.png');
    }

    return $strAvatar;
}

/* Function check gender user */
function checkGenderUser($gender)
{   
    if($gender == 0) $arrGender = [__('message.other'), "gender"=>["checked", "", ""]];
    elseif($gender == 1) $arrGender = [__('message.male'), "gender"=>["", "checked", ""]];
    else  $arrGender = [__('message.female'), "gender"=>["", "", "checked"]];

    return $arrGender;
}
/* Function check gender user */

function getTypeUser($type)
{
    if($type == 1) return "Admin";
    else return "User";
}

function getStatusUser($status)
{
    if($status == 1) return "<div class='bg-success color-palette'><i class='fas fa-check'>&nbsp;&nbsp;&nbsp;</i>".trans('user_lang.active')."</div>";
    if($status == 2) return "<div class='bg-warning color-palette'><i class='fas fa-user-lock'>&nbsp;&nbsp;&nbsp;</i>".trans('user_lang.block')."</div>";
}
?>