<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Config;
use App\Services\ConditionQueryService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::scopeProduct();
        return view('public.pages.product', ['products'=>$products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ConditionQueryService $conditionQuery, $cat_key)
    {
        /* Call function createConditionQueryProduct() retrieve condition */
        $condition = $conditionQuery->createConditionQueryProduct($cat_key);
        $products = Product::scopeProduct($condition);

        return view('public.pages.product', ['products'=>$products]);
    }

    public function showDetailProduct($cat_key, $product_key)
    {
        $arrProductKey = explode("-", $product_key);
        $uidProduct = $arrProductKey[count($arrProductKey) - 1];

        $productDetail = Product::scopeProductDetail($uidProduct);

        return view('public.pages.product_detail',["productDetail" => $productDetail]);
    }

}
