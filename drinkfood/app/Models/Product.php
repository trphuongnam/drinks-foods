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

    /* Function get product */
    protected function scopeProduct($condition = null)
    {
        if($condition != null) array_push($condition, ['products.status', '=',1]);
        else $condition = [['products.status', '=',1]];

        return Product::orderBy('id', 'DESC')->where($condition)
                ->join('categories', 'categories.id', 'products.id_cat')
                ->select('products.*', 'categories.url_key as cat_url_key', 'categories.uid as uid_cat')
                ->paginate(10);
    }

    /* Function get product detail */
    protected function scopeProductDetail($uidProduct)
    {
        return Product::where("products.uid", $uidProduct)
          ->join("users", "users.id", "=", "products.id_user_created")
          ->join('categories', 'categories.id', 'products.id_cat')
          ->select("products.*", "users.fullname as user_fullname","categories.name as cat_name", "categories.url_key as cat_url_key", "categories.uid as uid_cat")      
          ->get();
    }
}
