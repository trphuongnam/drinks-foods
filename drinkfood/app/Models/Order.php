<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'id_user_created',
        'status',
        'uid',
        'url_key'
    ];
    
    public function user()
    {
        return $this->belongsTo("App\Models\User", "id_user_created", "id");
    }

    public function order_detail()
    {
        return $this->hasMany("App\Models\OrderDetail", "id_order", "id");
    }

    protected function scopeGetHistoryOrder($idUser)
    {
        $condition = [['id_user_created', '=',$idUser]];
        if(request()->filled('search')) array_push($condition, ['name', 'LIKE', "%".request()->search."%"]);
        if(request()->has('status') && request()->status != 'all') array_push($condition, ['status', '=', request()->status]);

        $queryOrder = Order::orderBy('id', 'desc')->with('order_detail')->where($condition);
        if(request()->filled('date_order')) $queryOrder->whereDate('date_order', '=', request()->date_order);
        return $queryOrder->paginate(5);
    }

    protected function scopeGetInfoOrder($requestParams)
    {
        $condition = [['orders.status', '<>', 0]];
        if($requestParams->filled('content')) array_push($condition, ['name', '=', $requestParams->content]);
        if($requestParams->filled('status') && $requestParams->status != "all") array_push($condition, ['orders.status', '=', $requestParams->status]);

        $queryOrder = Order::orderBy('id', 'DESC')
            ->where($condition)
            ->join('users', 'orders.id_user_created', '=', 'users.id')
            ->select('orders.*', 'users.fullname as user_fullname');

        if($requestParams->filled('start_date') && $requestParams->filled('end_date')) $queryOrder->whereBetween('date_order', [$requestParams->start_date, $requestParams->end_date]);
        else if($requestParams->filled('start_date')) $queryOrder->whereBetween('orders.date_order', [$requestParams->start_date, date('Y-m-d')]);
        else if($requestParams->filled('end_date')) $queryOrder->whereBetween('orders.date_order', [date('Y-m-d'), $requestParams->end_date]);
        return $queryOrder->paginate(10);
    }
}
