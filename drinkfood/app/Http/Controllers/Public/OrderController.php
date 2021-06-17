<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->orderService = new OrderService;
    }

    /* Function send request order of user */
    public function store(Request $request)
    {
        return $this->orderService->handlingOrder($request);
    }

    /* Function show history order */
    public function show($urlKey)
    {
        $arrayUrlKey = explode('-', $urlKey);
        $uidOrder = $arrayUrlKey[count($arrayUrlKey)-1];

        $orderInfo = Order::where('uid', $uidOrder)->get();
        $detailOrder = OrderDetail::scopGetDetailOrder($orderInfo[0]->id);
        return view('public.pages.order_detail', ['detailOrder'=>$detailOrder, 'orderInfo'=>$orderInfo]);
    }

    /*Function destroy order*/
    public function destroy($uidOrder)
    {
        $delete_order = Order::where('uid', $uidOrder)->delete();
        if($delete_order) 
        {
            Session::flash('msg_delete_order', trans_choice('message.delete_order', 1));
            return redirect()->route('user.index');
        }else{
            Session::flash('msg_delete_order', trans_choice('message.delete_order', 2));
            return redirect()->route('user.index');
        }
    }
}
