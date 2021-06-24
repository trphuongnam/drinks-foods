<?php

use App\Models\Order;

/* Function get historyOrder */
function getHistoryOrder($idUser)
{
    return Order::scopeGetHistoryOrder($idUser);
}

function formatCurrency($currency)
{
    return number_format($currency, 0, ',', '.')." VND";
}

/* Function change color text with status */
function changeColorStatus($status){
    $arrayColorStatus = ['red', 'black', 'blue', 'orange', 'green'];
    return $arrayColorStatus[$status];
}
?>