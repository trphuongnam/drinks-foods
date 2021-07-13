<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFExportController extends Controller
{
    public function exportInvoice($uidOrder)
    {
        try {
            $orderInfo = Order::where('uid', $uidOrder)->get();
            $detailOrder = OrderDetail::scopGetDetailOrder($orderInfo[0]->id);
            $data = ['detailOrder'=>$detailOrder, 'orderInfo'=>$orderInfo];

            $pdf = PDF::loadView('pdf.invoice', ['data'=>$data]);
            return $pdf->download('drinks-foods-invoice-'.$orderInfo[0]->uid.'.pdf');
        } catch (\Throwable $th) {
            dd(throw $th);
        }
        
    }
}
