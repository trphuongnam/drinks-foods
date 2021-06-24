<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
class HomeController extends Controller
{
    function index()
    {
        $products = Product::where("products.status","=",1)
                            ->join("categories", "categories.id", "=", "products.id_cat")
                            ->select("products.*", "categories.uid as uid_cat", "categories.url_key as cat_url_key")
                            ->orderBy("id", "DESC")->get();
        return view('public.pages.home', ['products'=>$products, 'cat_key'=>'']);
    }

    function language($lang)
    {
        Session::put('current_language', $lang);
        return redirect()->back();
    }
}
