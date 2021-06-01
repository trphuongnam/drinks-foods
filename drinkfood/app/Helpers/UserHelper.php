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

?>