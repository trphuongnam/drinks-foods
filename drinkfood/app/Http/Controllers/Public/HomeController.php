<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function home()
    {
        return view('public/pages/home');
    }

    function product()
    {
        return view('public/pages/product');
    }

    function language($lang)
    {
        Session::put('current_language', $lang);
        return redirect()->back();
    }
}
