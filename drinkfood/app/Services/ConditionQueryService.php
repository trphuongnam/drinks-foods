<?php
namespace App\Services;
use App\Models\Category;

class ConditionQueryService {
    public function createConditionQueryProduct($cat_key = null)
    {
        $condition = []; 
        $typeCat = "";
        if($cat_key != null)
        {
            $arrCatKey = explode("-", $cat_key);
            $catCode = $arrCatKey[count($arrCatKey)-1];
            if(isset(config('enums.productTypes')[$catCode]))
            {
                array_push($condition, ['products.type', '=', $catCode]);
                $typeCat = $catCode;
            }else{
                $infoCat = Category::where("uid", $catCode)->select('id', 'name', 'type')->get();
                array_push($condition, ['products.id_cat', '=', $infoCat[0]['id']]);
                $typeCat = $infoCat[0]['type'];
            }
        }
        return [$condition, $typeCat];
    }
}

?>