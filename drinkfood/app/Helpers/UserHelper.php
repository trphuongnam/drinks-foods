<?php

/* Function check avatar user*/
function checkUserAvatar($avatar, $gender)
{
    if($avatar != "") $strAvatar = $avatar;
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
    if($gender == 0) $arrGender = [__('message.other'), "checked"];
    elseif($gender == 1) $arrGender = [__('message.male'), "checked"];
    else  [__('message.female'), "checked"];

    return $arrGender;
}

/* Functi */

?>