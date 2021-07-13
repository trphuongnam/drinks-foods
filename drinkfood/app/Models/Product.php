<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'brand',
        'image',
        'id_cat',
        'id_user_created',
        'price',
        'type',
        'status',
        'uid',
        'url_key',
        'stars',
    ];

    /* Function search of object searchable */
    public function getSearchResult(): SearchResult
    {
        $idCategory = Product::where('id', $this->id)->value('id_cat');
        $urlCategory = Category::where('id', $idCategory)->select('url_key', 'uid')->get();
        $url = route('product.detail', $urlCategory[0]->url_key.'-'.$urlCategory[0]->uid.'/'.$this->url_key.'-'.$this->uid);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

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
    protected function scopeProduct($condition, $requestParams)
    {
        if($condition != null) array_push($condition, ['products.status', '=',1]);
        else $condition = [['products.status', '=',1]];

        $productQuery = Product::where($condition)
                ->join('categories', 'categories.id', 'products.id_cat')
                ->select('products.*', 'categories.url_key as cat_url_key', 'categories.uid as uid_cat');  
        
        /* Create condition search, order */
        if($requestParams->filled('search')) $productQuery->where('products.name', 'like', '%'.$requestParams->search.'%');
        if($requestParams->order == 1) $productQuery->orderBy('products.name', 'ASC');
        if($requestParams->order == 2) $productQuery->orderBy('products.price', 'ASC');
        if($requestParams->order == 3) $productQuery->orderBy('products.price', 'DESC');
        
        /* Create condition price_start */
        if($requestParams->filled('price_start') && $requestParams->filled('price_end'))  $productQuery->whereBetween('price', [$requestParams->price_start, $requestParams->price_end]);
        elseif($requestParams->filled('price_start')) $productQuery->whereBetween('price', [$requestParams->price_start, 500000]);
        elseif($requestParams->filled('price_end')) $productQuery->whereBetween('price', [1000, $requestParams->price_end]);

        /* Create condition rating */
        if($requestParams->filled('rating')) $productQuery->where('products.stars', '=', $requestParams->rating);

        $products = $productQuery->paginate(10);
        return $products;
    }

    /* Function get infor product edit */
    protected function scopeProductInfo($uidProduct)
    {
        return Product::where('uid', $uidProduct)->get();
    }

    /* Function get product detail */
    protected function scopeProductDetail($uidProduct)
    {
        return Product::where([["products.uid", '=',$uidProduct], ['products.status', '=', config('enums.statusDisplay.display')]])
          ->join("users", "users.id", "=", "products.id_user_created")
          ->join('categories', 'categories.id', 'products.id_cat')
          ->select("products.*", "users.fullname as user_fullname","categories.name as cat_name", "categories.url_key as cat_url_key", "categories.uid as uid_cat")      
          ->get();
    }

    protected function scopeGetInfoProductCart($idProduct)
    {
        return Product::where("products.id", $idProduct)
          ->join('categories', 'categories.id', 'products.id_cat')
          ->select("products.*", "categories.name as cat_name", "categories.url_key as cat_url_key", "categories.uid as uid_cat")      
          ->get()->toArray();
    }

    protected function scopeRatingProduct($idProduct)
    {
        return Product::where("id", $idProduct)->value("stars");
    }

    protected function scopeGetNameProduct($idProduct)
    {
        return Product::where("id", $idProduct)->value("name");
    }
}