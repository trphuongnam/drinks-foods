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
        return Order::orderBy('id', 'desc')->with('order_detail')->where('id_user_created', $idUser)->paginate(5);
    }
}
