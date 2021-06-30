<?php
namespace App\Services;

use App\Models\Order;

class StatisticService
{
    public function handlingMonthlyOrderStatistics()
    {
        /* Calc total order in month */
        $totalOrderInMonth = Order::withTrashed()->whereMonth('date_order', date('m'))
            ->whereYear('date_order', date('Y'))
            ->count();

        /* Count total order finished */
        $totalOrderFinished = Order::withTrashed()->where('status', 4)->whereMonth('date_order', date('m'))
        ->whereYear('date_order', date('Y'))
        ->count();

        /* Count total order waiting accept */
        $totalOrderWaitingAccept = Order::withTrashed()->where('status', 1)->whereMonth('date_order', date('m'))
        ->whereYear('date_order', date('Y'))
        ->count();

        /* Count total order Processing */
        $totalOrderProcessing = Order::withTrashed()->where('status', 2)->whereMonth('date_order', date('m'))
        ->whereYear('date_order', date('Y'))
        ->count();

        /* Count total order deliveryed */
        $totalOrderDelivery = Order::withTrashed()->where('status', 3)->whereMonth('date_order', date('m'))
        ->whereYear('date_order', date('Y'))
        ->count();
        
        /* Count total order canceled */
        $totalOrderCanceled = Order::withTrashed()->where('status', 5)->whereMonth('date_order', date('m'))
        ->whereYear('date_order', date('Y'))
        ->count();
        
        $arrayRatio = [];
        /* Calc ratio type order */
        $ratioOrderFinished = ($totalOrderFinished / $totalOrderInMonth)*100;
        array_push($arrayRatio, [trans('order_lang.finished'), $ratioOrderFinished]);

        $ratioOrderWaitingAccept = ($totalOrderWaitingAccept / $totalOrderInMonth)*100;
        array_push($arrayRatio, [trans('order_lang.awaiting_confirmation'), $ratioOrderWaitingAccept]);

        $ratioOrderProcessing = ($totalOrderProcessing / $totalOrderInMonth)*100;
        array_push($arrayRatio, [trans('order_lang.processing'), $ratioOrderProcessing]);

        $ratioOrderDelivery = ($totalOrderDelivery / $totalOrderInMonth)*100;
        array_push($arrayRatio, [trans('order_lang.delivery_in_progress'), $ratioOrderDelivery]);

        $ratioOrderCanceled = ($totalOrderCanceled / $totalOrderInMonth)*100;
        array_push($arrayRatio, [trans('order_lang.Cancelled'), $ratioOrderCanceled]);

        return $arrayRatio;
    }
}

?>