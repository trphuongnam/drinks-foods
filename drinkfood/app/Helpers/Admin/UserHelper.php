<?php

function selectedSearchType($searchType)
{
    $optionSearchType = "";
    for($i = 0; $i <= 1; $i++)
    {
        $arraySearchType = ['fullname', 'username'];
        $selected = "";
        if($searchType == $i) $selected = "selected";
        $optionSearchType .= "<option value='".$i."' $selected>".trans('message.'.$arraySearchType[$i])."</option>";
    }
    return $optionSearchType;
}

function selectedTypeUser($type)
{
    $optionTypeUser = "";
    for($i = 3; $i >= 0; $i--)
    {
        $arrayUserType = ['User', 'Admin', 'Manager','All'];
        $selected = "";
        if($type == $i) $selected = "selected";
        $optionTypeUser .= "<option value='".$i."' $selected>".$arrayUserType[$i]."</option>";
    }
    return $optionTypeUser;
}

function selectedStatusUser($status)
{
    $optionStatusUser = "";
    for($i = 0; $i <= 2; $i++)
    {
        $arrayUserType = ['all', 'active', 'block'];
        $selected = "";
        if($status == $i) $selected = "selected";
        $optionStatusUser .= "<option value='".$i."' $selected>".trans('user_lang.'.$arrayUserType[$i])."</option>";
    }
    return $optionStatusUser;
}

?>