<?php
use Illuminate\Support\Facades\Auth;

function showButtonBuyProduct($uidProduct)
{
    $buttonBuyProduct = "";
    if(Auth::check() == true)
    {
        $buttonBuyProduct = "<div class='buy_now_button'><a href='javascript:void(0)' id='btn_add_cat_$uidProduct' onclick='addCart(\"".$uidProduct."\")'>".trans('message.add_cart')."</a></div>";
    }
    return $buttonBuyProduct;
}

function showButtonRating()
{
    $buttonRatingProduct = "<a href='".url('/sign_in')."'>".trans('message.err_rating')."</a>";
    if(Auth::check() == true)
    {
        $buttonRatingProduct = "<a href='javascript:void(0)' id='btn_ratings'>".trans('message.btn_ratings')."</a>";
    }
    return $buttonRatingProduct;
}

?>