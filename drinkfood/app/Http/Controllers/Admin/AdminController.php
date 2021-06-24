<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StatisticService;

class AdminController extends Controller
{
    public function index(StatisticService $statisticService, Request $request)
    {
        $arrayMonthlyRevenue = $statisticService->calcMonthlyRevenue();

        $arrayRatioOrders = $statisticService->handlingMonthlyOrderStatistics($request);
        return view('admin.pages.index', ['arrayMonthlyRevenue' => $arrayMonthlyRevenue, 'arrayRatioOrders' => $arrayRatioOrders]);
    }
}
