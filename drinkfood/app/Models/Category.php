<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'type',
        'id_user_created',
        'status',
        'uid',
        'url_key'
    ];

    public function product()
    {
        return $this->hasMany("App\Models\Product", "id_cat", "id");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "id_user_created", "id");
    }

    protected function getCategoryChangeType($type)
    {
        return Category::where([['status','=', 1], ['type','=',$type]])->select('id', 'name')->get();
    }

    protected function scopeGetCatName($idCat)
    {
        return Category::where('id', $idCat)->value('name');
    }
}
