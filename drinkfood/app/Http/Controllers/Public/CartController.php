<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->cartService = new CartService; 
    }
    
    public function index()
    {
        if(Auth::check() == true)
        {
            $idOrder = Order::where([['id_user_created', '=', Auth::user()->id], ['status', '=', 0]])->value('id');
            $cartDetail = OrderDetail::scopeDetailCart($idOrder);
            $arrayProduct = [];
            if(count($cartDetail) > 0)
            {
                for($i = 0; $i < count($cartDetail); $i++)
                {
                    $productOrder = Product::scopeGetInfoProductCart($cartDetail[$i]->id_product);
                    array_push($arrayProduct, $productOrder);                    
                }          
                return view("public.pages.cart", ['arrayProduct'=>$arrayProduct, 'idOrder'=>$idOrder,'status'=>1]);
            }else{
                return view("public.pages.cart", ['arrayProduct'=>$arrayProduct, 'status'=>0]);
            }
        }
        else return redirect()->route('sign_in.index');
    }

    /* Function add product to cart */
    public function store(Request $request)
    {
        return $this->cartService->addProductToCart($request);
    }

    /* Function remove product in the cart */
    public function removeProduct(Request $req)
    {
        $deleteProduct = OrderDetail::where([['id_product','=',$req->idProduct], ['id_order','=',$req->idOrder]])->delete();
        if($deleteProduct == true)
        {
            /* Delete session product saved */
            $req->session()->forget($req->uidProduct);
            return ['status'=>true, 'message'=>__('message.delete_product_order_success')];
        }else return ['status'=>false, 'message'=>__('message.delete_product_order_error')];
    }

    /* Function set session when user update quantity product in the cart */
    public function setSession(Request $request)
    {        
        return $request->session()->put($request->uidProduct, $request->all());
    }

    /* Function cancel order */
    public function destroy(Request $request, $id)
    {
        return $this->cartService->destroyCart($request, $id);
    }
}
