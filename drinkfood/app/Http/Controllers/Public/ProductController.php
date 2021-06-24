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
    public function show(ConditionQueryService $conditionQuery, Request $request, $cat_key=null)
    {
        if($cat_key != null)
        {
            $arrayCondition = $conditionQuery->createConditionQueryProduct($cat_key);
            $products = Product::scopeProduct($arrayCondition[0], $request);
            $typeCat = $arrayCondition[1];
        }else{
            $arrayCondition = $conditionQuery->createConditionQueryProduct();
            $products = Product::scopeProduct($arrayCondition[0], $request);
            $typeCat = "";
        }
        return view('public.pages.product', ['products'=>$products, 'typeCat'=>$typeCat], ['cat_key'=>$cat_key]);
    }

    public function showDetailProduct($cat_key, $product_key)
    {
        $arrProductKey = explode("-", $product_key);
        $uidProduct = $arrProductKey[count($arrProductKey) - 1];

        $productDetail = Product::scopeProductDetail($uidProduct);

        return view('public.pages.product_detail',["productDetail" => $productDetail]);
    }

}
