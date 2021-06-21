<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Services\OrderService;

use Illuminate\Http\Request;

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

    /*Function destroy order*/
    public function destroy($id)
    {
        //
    }
}
