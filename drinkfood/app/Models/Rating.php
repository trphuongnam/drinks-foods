<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'star',
        'id_user',
        'id_product',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "id_user", "id");
    }

    public function product()
    {
        return $this->belongsTo("App\Models\Product", "id_product", "id");
    }

    protected function scopeGetStarUserRating($idProduct, $idCurrentUser)
    {
        return Rating::where(["id_product"=>$idProduct, "id_user"=>$idCurrentUser])->value("star");
    }
}
