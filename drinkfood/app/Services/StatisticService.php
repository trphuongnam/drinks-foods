<?php
namespace App\Services;

use App\Models\Order;

class StatisticService
{
    function calcMonthlyRevenue()
    {
        $arrayMonthData = [];
        $arrayColorMonth = [1 =>'#6610f2', 2 =>'#6610f2', 3 =>'#6610f2', 4 =>'#6610f2', 5 =>'#f012be', 6 =>'#e83e8c', 
                            7 =>'#d81b60', 8 =>'#ff851b', 9 =>'#ff851b', 10 =>'#39cccc', 11 =>'#3d9970', 12 =>'#007bff'];
        for ($month = 1; $month < 13; $month++)
        {
            $totalAmountMonth = Order::where('status', config('enums.orderStatusValue.finished'))->whereMonth('date_order', $month)
                ->whereYear('date_order', date('Y'))
                ->select('total_amount')
                ->sum('total_amount');
            $arrayMonthData[$month] = ['month'=> trans('chart_lang.'.$month), 'total'=>$totalAmountMonth, 'color'=>$arrayColorMonth[$month]];
            array_push($arrayMonthData, $arrayMonthData[$month]);
        }
        return $arrayMonthData;
    }

    public function handlingMonthlyOrderStatistics($request)
    {
        $arrayRatio = [];

        if($request->has('date') &&  $request->has('month')) $date = date('Y').'-'.$request->month.'-'.$request->date;
        else $date = date('Y-m-d');
                
        /* Count total order finished */
        $totalOrderFinished = Order::withTrashed()->where('status', config('enums.orderStatusValue.finished'))->whereBetween('date_order', [$date, $date.' 23:59:59'])
        ->count();
        array_push($arrayRatio, ['status'=>trans('order_lang.finished'), 'ratio'=>$totalOrderFinished]);
        
        /* Count total order waiting accept */
        $totalOrderWaitingAccept = Order::withTrashed()->where('status', config('enums.orderStatusValue.awaiting_confirmation'))->whereBetween('date_order', [$date, $date.' 23:59:59'])
        ->whereYear('date_order', date('Y'))
        ->count();
        array_push($arrayRatio, ['status'=>trans('order_lang.awaiting_confirmation'), 'ratio'=>$totalOrderWaitingAccept]);
        
        /* Count total order Processing */
        $totalOrderProcessing = Order::withTrashed()->where('status', config('enums.orderStatusValue.processing'))->whereBetween('date_order', [$date, $date.' 23:59:59'])
        ->whereYear('date_order', date('Y'))
        ->count();
        array_push($arrayRatio, ['status'=>trans('order_lang.processing'),  'ratio'=>$totalOrderProcessing]);
       
        /* Count total order deliveryed */
        $totalOrderDelivery = Order::withTrashed()->where('status', config('enums.orderStatusValue.delivery_in_progress'))->whereBetween('date_order', [$date, $date.' 23:59:59'])
        ->whereYear('date_order', date('Y'))
        ->count();
        array_push($arrayRatio, ['status'=>trans('order_lang.delivery_in_progress'),  'ratio'=>$totalOrderDelivery]);

        /* Count total order canceled */
        $totalOrderCanceled = Order::withTrashed()->where('status', config('enums.orderStatusValue.Cancelled'))->whereBetween('date_order', [$date, $date.' 23:59:59'])
        ->whereYear('date_order', date('Y'))
        ->count();
        array_push($arrayRatio, ['status'=>trans('order_lang.Cancelled'),  'ratio'=>$totalOrderCanceled]);
        
        return $arrayRatio;
    }
}

?>