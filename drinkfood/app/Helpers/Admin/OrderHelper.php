<?php
use App\Models\User;

function displayStatusOrder($status, $uidOrder)
{
    $class_status = build_status_class($status);
    $class = "bg-".$class_status." color-palette";
    return "<span class='".$class."' id='order_$uidOrder' status=$status>".trans('order_lang.'.config('enums.orderStatus.'.$status))."</span>";
}

function build_status_class($status){
    switch ($status) {
        case config('enums.orderStatusValue.awaiting_confirmation'):
            $class = "warning";
            break;
        case config('enums.orderStatusValue.processing'):
            $class = "primary";
            break;
        case config('enums.orderStatusValue.delivery_in_progress'):
            $class = "info";
            break;
        case config('enums.orderStatusValue.finished'):
            $class = "success";
            break;
        case config('enums.orderStatusValue.Cancelled'):
            $class = "danger";
            break;
        default:
            $class = "";
            break;
    }
    return $class;
}
function getInfoUserOrder($idUser)
{
    return User::scopeInfoUser($idUser);    
}

function showButtonHandling($status, $uidOrder)
{
    $class_status = build_status_class($status);
    if($status != 4)  return "<a href='javascript:void(0)' class='btn btn-block btn-$class_status' id='$uidOrder' onclick='accept_order(\"$uidOrder\")' >".trans_choice('order_lang.btn_handling', $status)."</a>";
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