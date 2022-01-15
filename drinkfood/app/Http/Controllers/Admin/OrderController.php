<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::scopeGetInfoOrder($request);
        return view('admin.pages.orders.orders', ['orders' => $orders]);
    }

    public function show($uid)
    {
        $idOrder = Order::where('uid', $uid)->value('id');
        $detailOrder = OrderDetail::scopeGetOrderDetailAdmin($idOrder);
        return view('admin.pages.orders.order_detail', ['detailOrder' => $detailOrder, 'uidOrder'=>$uid]);
    }

    public function update(Request $request)
    {
        if($request->status == 1) $data['status'] = 2;
        if($request->status == 2) $data['status'] = 3;
        if($request->status == 3) $data['status'] = 4;

        $updateStatus = Order::where('uid', $request->uidOrder)->update($data);
        if($updateStatus == true) return ['status' => $data['status'], 'text_status' => __('order_lang.'.config('enums.orderStatus.'.$data['status'])), 'button'=>trans_choice('order_lang.btn_handling', $data['status'])];
        else return ['status' => false, 'message'=>__('order_lang.update_status_order_error')];
    }
}
