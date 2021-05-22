<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function rating()
    {
        return $this->hasMany("App\Models\Rating", "id_product", "id");
    }
    
    public function order_detail()
    {
        return $this->hasMany("App\Models\OrderDetail", "id_product", "id");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\Category", "id_cat", "id");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "id_user_created", "id");
    }
}
