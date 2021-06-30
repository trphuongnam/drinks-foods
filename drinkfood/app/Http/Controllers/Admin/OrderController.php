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

    public function update(Request $request, $idOrder)
    {
        if($request->status == 1) $data['status'] = 2;
        if($request->status == 2) $data['status'] = 3;
        if($request->status == 3) $data['status'] = 4;

        $updateStatus = Order::where('id', $idOrder)->update($data);
        if($updateStatus == true) return redirect()->back()->with('update_status_order_success', __('order_lang.update_status_order_success'));
        else  return redirect()->back()->with('update_status_order_error', __('order_lang.update_status_order_error'));
    }
}
