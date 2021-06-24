<?php

function showOptionSelectMonth($param)
{
    $optionMonth = "";
    for($month = 1; $month < 13; $month ++)
    {
        if($month == $param) $selected = "selected";
        else $selected = "";
        $optionMonth .= "<option value='".$month."' $selected>".trans('chart_lang.'.$month)."</option>";
    }
    return $optionMonth;
}

?>