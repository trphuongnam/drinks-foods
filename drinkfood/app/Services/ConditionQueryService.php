<?php
namespace App\Services;
use App\Models\Category;

class ConditionQueryService {
    public function createConditionQueryProduct($cat_key)
    {
        $arrCatKey = explode("-", $cat_key);
        $catCode = $arrCatKey[count($arrCatKey)-1];

        $condition = []; 
        if(isset(config('enums.productTypes')[$catCode]))
        {
            array_push($condition, ['products.type', '=', $catCode]);
        }else{
            $idCat = Category::where("uid", $catCode)->value('id');
            array_push($condition, ['products.id_cat', '=', $idCat]);
        }
        return $condition;
    }
}

?>