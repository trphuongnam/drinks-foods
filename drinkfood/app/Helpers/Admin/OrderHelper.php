<?php
use App\Models\User;

function displayStatusOrder($order)
{
    $class = "";
    if($order == config('enums.orderStatusValue.awaiting_confirmation')) $class = "bg-warning color-palette";
    if($order == config('enums.orderStatusValue.processing')) $class = "bg-primary color-palette";
    if($order == config('enums.orderStatusValue.delivery_in_progress')) $class = "bg-info color-palette";
    if($order == config('enums.orderStatusValue.finished')) $class = "bg-success color-palette";
    if($order == config('enums.orderStatusValue.Cancelled')) $class = "bg-danger color-palette";

    return "<span class='".$class."'>".trans('order_lang.'.config('enums.orderStatus.'.$order))."</span>";
}

function getInfoUserOrder($idUser)
{
    return User::scopeInfoUser($idUser);    
}

function showButtonHandling($status)
{
    if($status == config('enums.orderStatusValue.awaiting_confirmation')) return "<button class='btn btn-block btn-warning col-3'>".trans('order_lang.accept_order')."</button>";
    if($status == config('enums.orderStatusValue.processing')) return "<button class='btn btn-block btn-warning col-3'>".trans('order_lang.delivery')."</button>";
    if($status == config('enums.orderStatusValue.delivery_in_progress')) return "<button class='btn btn-block btn-warning col-3'>".trans('order_lang.finish_order')."</button>";
}

function selectedStatusOrder($status)
{
    $optionStatus = "<option value='all' selected>".trans('message.all')."</option>";
    for($i = 1; $i <= 5; $i++)
    {
        $selected = "";
        if($status == $i) $selected = "selected";
        $optionStatus .= "<option value='".$i."' $selected>".trans('order_lang.'.config('enums.orderStatus.'.$i))."</option>";
    }
    return $optionStatus;
}
?>