<?php

use App\Models\Category;
function displayOptionType($types)
{
    $arrayTypeName = [
        1 => 'foods',
        2 => 'drinks'
    ];

    $optionType = "";
    for ($i = 1; $i <= 2; $i++)
    {
        if($types == $i) $selected = "selected";
        else $selected = "";
        $optionType .= "<option value='$i' $selected>".trans('message.'.$arrayTypeName[$i])."</option>";
    }
    return $optionType;
}

function displayOptionSelectCategory($categories, $idCat)
{
    $optionCategory = "";
    foreach ($categories as $category)
    {
        if($idCat == $category->id) $selected = "selected";
        else $selected = "";
        $optionCategory .= "<option value='".$category->id."'$selected>".$category->name."</option>";
    }
    return $optionCategory;
}

function getCategoryName($idCat)
{
    return Category::scopeGetCatName($idCat);
}
?>