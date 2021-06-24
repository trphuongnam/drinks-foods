<?php

function selectedTypeCat($typeCat)
{
    $optionCategory = "";
    for($i = 1; $i <= 2; $i++)
    {
        $selected = "";
        if($typeCat == $i) $selected = "selected";
        $optionCategory .= "<option value='".$i."' $selected>".trans('message.'.config('enums.productTypes.'.$i))."</option>";
    }
    return $optionCategory;
}

function selectedTypeSearch($type)
{
    $optionCategory = "";
    for($i = 0; $i <= 2; $i++)
    {
        $selected = "";
        if($type == $i) $selected = "selected";
        if($i == 0)  $optionCategory .= "<option value='".$i."' $selected>".trans('message.all')."</option>";
        else $optionCategory .= "<option value='".$i."' $selected>".trans('message.'.config('enums.productTypes.'.$i))."</option>";
    }
    return $optionCategory;
}

/* Function selected status in search bar */
function selectedStatus($status)
{
    $optionStatus = "";
    for($i = 0; $i <= 2; $i++)
    {
        $selected = "";
        if($status == $i) $selected = "selected";
        if($i == 0) $optionStatus .= "<option value='".$i."' $selected>".trans('message.all')."</option>";
        else $optionStatus .= "<option value='".$i."' $selected>".trans_choice('message.hidden', $i)."</option>";
    }
    return $optionStatus;
}

function checkedStatus($status)
{
    $radioStatus = "";
    for($i = 1; $i <= 2; $i++)
    {
        $checked = "";
        if($status == $i) $checked = "checked";
        $radioStatus .= "<div class='form-check'><input class='form-check-input' value='$i' type='radio' name='status' $checked><label class='form-check-label'>".trans_choice('message.hidden', $i)."</label></div>";
    }
    return $radioStatus;
}

function addParamsPaginateCategory()
{
    $paramFilter = "";
    if(request()->filled('content')) $paramFilter .= "&content=".request()->content;
    if(request()->filled('status')) $paramFilter .= "&status=".request()->status;
    if(request()->filled('type')) $paramFilter .= "&type=".request()->type;
    return $paramFilter;
}
?>