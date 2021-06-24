<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportStatistics implements FromCollection
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::all();
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->name,
                '2' => $row->id_user_created,
                '3' => $row->status,
                '4' => $row->uid,
                '5' => number_format($row->total),
            );
        }

        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'STT',
            'Trạng thái',
            'Số lượng',
            'Tổng cộng',
        ];
    }
}
