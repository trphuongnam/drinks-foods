<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LibraryStrings\Strings;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->strings = new Strings;    
    }
    
    public function index()
    {
        return view("public.pages.cart");
    }

    /* Function add product to cart */
    public function store(Request $request)
    {
        try {
            if(Auth::check())
            {
                $checkOrder = Order::where([['id_user_created','=',Auth::user()->id], ['status','=',0]])->get();

                if(count($checkOrder) > 0)
                {
                    /* Update product selected to this order */
                    return $this->createOrderDetail($request, $checkOrder[0]->uid);
                    
                }else{
                    /* Create new order and save product selected to order detail */
                    $createOrder = $this->createNewOrders();
                    if($createOrder[0] == true)
                    {
                        $this->createOrderDetail($request, $createOrder[1]);
                        return ['message'=>__('message.success_add_cart'), 'status'=>1];
                    }else{
                        return ['message'=>trans_choice('message.err_add_cart', 2), 'status'=>2];
                    }
                }

            }else{
                return ['message'=>trans_choice('message.err_add_cart', 1), 'status'=>2];
            }
        } catch (\Throwable $th) {
            return $th;
        }       
    }

    /* Function create new order */
    private function createNewOrders()
    {
        $orderName = "order_".Auth::user()->uid.'_'.time();
        $uidOrder =  $this->strings->rand_string();

        $order['name'] = $orderName;
        $order['id_user_created'] = Auth::user()->id;
        $order['uid'] = $uidOrder;
        $order['url_key'] = Str::slug($orderName);
        $order['status'] = 0;
        $createOrder = Order::create($order);

        return [$createOrder, $uidOrder];
    }

    /* Function create order detail */
    private function createOrderDetail($req, $uidOrder)
    {
        $id_order = Order::where('uid', $uidOrder)->value('id');
        $infoProduct = Product::where('uid', $req->uidProduct)->select('id', 'url_key', 'price')->get();
        if(count($infoProduct) > 0)
        {
            /* Check if the existing product is the same as the selected product in the table, then update the quantity of that product*/
            /* If not existing then create new product in order_details table */
            $productOrderDetail = OrderDetail::where([['id_order', '=', $id_order], ['id_product', '=', $infoProduct[0]->id]])->get();
            if(count($productOrderDetail) > 0)
            {
                $updateOrderDetail = OrderDetail::where('id_order', $id_order)
                        ->where('id_product', $infoProduct[0]->id)
                        ->update(['quantity' => $productOrderDetail[0]->quantity + 1]);

                if($updateOrderDetail == true) return ['message' => __('message.success_add_cart'), 'status' => 1];
                else return ['message' => __('message.err_add_cart'), 'status' => 2];
            }else{
                $orderDetail['id_order'] = $id_order;
                $orderDetail['id_product'] = $infoProduct[0]->id;
                $orderDetail['quantity'] = 1;
                $orderDetail['unit_price'] = $infoProduct[0]->price;
                $orderDetail['uid'] = $this->strings->rand_string();
                $orderDetail['url_key'] = $infoProduct[0]->url_key.'-'.$req->uidProduct;
                $createOrderDetail = OrderDetail::create($orderDetail);

                if($createOrderDetail == true) return ['message' => __('message.success_add_cart'), 'status' => 1];
                else return ['message' => __('message.err_add_cart'), 'status' => 2];
            }
        }else{
            return ['message' => __('message.not_exist_product'), 'status' => 2];
        }  
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
