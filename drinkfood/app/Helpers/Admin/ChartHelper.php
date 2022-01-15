<?php

/* Begin: Function show all date in month */
function showOptionSelectDate($dateParam)
{
    if($dateParam == "") $dateParam = date('d');
    $optionDate = "";
    for($date = 1; $date <= 31; $date ++)
    {
        if($date == $dateParam) $selected = "selected";
        else $selected = "";
        $optionDate .= "<option value='".$date."' $selected>".$date."</option>";
    }
    return $optionDate;
}

function showOptionSelectMonth($paramMonth)
{
    if($paramMonth == "") $paramMonth = date('m');
    $optionMonth = "";
    for($month = 1; $month < 13; $month ++)
    {
        if($month == $paramMonth) $selected = "selected";
        else $selected = "";
        $optionMonth .= "<option value='".$month."' $selected>".trans('chart_lang.'.$month)."</option>";
    }
    return $optionMonth;
}

?>