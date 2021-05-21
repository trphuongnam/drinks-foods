<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo("App\Models\Order", "id_order", "id");
    }

    public function product()
    {
        return $this->belongsTo("App\Models\Product", "id_product", "id");
    }
}
