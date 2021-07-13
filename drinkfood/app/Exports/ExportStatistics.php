<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStatistics implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if(request()->filled('date') && request()->filled('month')) $date = date('Y').'-'.request()->month.'-'.request()->date;
        else $date = date("Y-m-d");

        /* Calc total and sum of orders finished */
        $totalOrdersFinished = Order::scopeCountOrderDay($date, config('enums.orderStatusValue.finished'));   
        $totalAmountOrderFinish = Order::scopeCalcTotalAmountDay($date, config('enums.orderStatusValue.finished'));

        /* Calc total and sum of orders awaiting confirmation*/
        $totalOrdersAwatingConfirm = Order::scopeCountOrderDay($date, config('enums.orderStatusValue.awaiting_confirmation'));   
        $totalAmountOrderAwatingConfirm = Order::scopeCalcTotalAmountDay($date, config('enums.orderStatusValue.awaiting_confirmation'));

        /* Calc total and sum of orders processing */
        $totalOrdersProcessing = Order::scopeCountOrderDay($date, config('enums.orderStatusValue.processing'));   
        $totalAmountOrderProcessing = Order::scopeCalcTotalAmountDay($date, config('enums.orderStatusValue.processing'));

        /* Calc total and sum of orders delivery_in_progress */
        $totalOrdersDelivery = Order::scopeCountOrderDay($date, config('enums.orderStatusValue.delivery_in_progress'));   
        $totalAmountOrderDelivery = Order::scopeCalcTotalAmountDay($date, config('enums.orderStatusValue.delivery_in_progress'));

        /* Calc total and sum of orders Cancelled */
        $totalOrdersCancelled = Order::scopeCountOrderDay($date, config('enums.orderStatusValue.Cancelled'));   
        $totalAmountOrderCancelled = Order::scopeCalcTotalAmountDay($date, config('enums.orderStatusValue.Cancelled'));

        /* Calc total day */
        $totalAmountDay = ($totalAmountOrderFinish + $totalAmountOrderAwatingConfirm + $totalAmountOrderProcessing + $totalAmountOrderDelivery + $totalAmountOrderCancelled);
        $totalAmountDay = number_format($totalAmountDay, 0, '', ',');

        $order = [
            [
                '0' => 1,
                '1' => trans('order_lang.orders_sold'),
                '2' => $totalOrdersFinished,
                '3' => number_format($totalAmountOrderFinish, 0, '', ',')
            ],
            [
                '0' => 2,
                '1' => trans('order_lang.orders_pending'),
                '2' => $totalOrdersAwatingConfirm,
                '3' => number_format($totalAmountOrderAwatingConfirm, 0, '', ',')
            ],
            [
                '0' => 3,
                '1' => trans('order_lang.orders_progress'),
                '2' => $totalOrdersProcessing,
                '3' => number_format($totalAmountOrderProcessing, 0, '', ',')
            ],
            [
                '0' => 4,
                '1' => trans('order_lang.orders_delivered'),
                '2' => $totalOrdersDelivery,
                '3' => number_format($totalAmountOrderDelivery, 0, '', ',')
            ],
            [
                '0' => 5,
                '1' => trans('order_lang.orders_cancelled'),
                '2' => $totalOrdersCancelled,
                '3' => number_format($totalAmountOrderCancelled, 0, '', ',')
            ],
            [
                '0' => "",
                '1' => trans('message.total'),
                '2' => "",
                '3' => $totalAmountDay
            ]
        ];
        return (collect($order));
    }

    public function headings(): array
    {
        return [
            trans('message.num_order'),
            trans('message.status'),
            trans('message.quantity'),
            trans('message.total'),
        ];
    }
    
}
