<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_order',
        'id_product',
        'quantity',
        'unit_price',
        'uid',
        'url_key'
    ];

    public function order()
    {
        return $this->belongsTo("App\Models\Order", "id_order", "id");
    }

    public function product()
    {
        return $this->belongsTo("App\Models\Product", "id_product", "id");
    }

    protected function scopeDetailCart($idOrder)
    {
        return OrderDetail::where('id_order', $idOrder)->get();
    }

    protected function scopeQuantityProduct($idOrder, $idProduct)
    {
        return OrderDetail::where([['id_order', '=', $idOrder], ['id_product', '=', $idProduct]])->value('quantity');
    }

    protected function scopGetDetailOrder($idOrder)
    {
        return OrderDetail::where('id_order', $idOrder)->get();
    }

    protected function scopeGetOrderDetailAdmin($idOrder)
    {
        return OrderDetail::where('orders.id', $idOrder)
            ->join('orders', 'orders.id', '=', 'order_details.id_order')
            ->select('order_details.*', 'orders.name as order_name', 'orders.id_user_created as id_user_created','orders.total_amount as total_amount', 'orders.date_order as date_order','orders.status as order_status')
            ->get();
    }
}
