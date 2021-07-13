<?php
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

function showRating($idProduct)
{
    $productRatings = Product::scopeRatingProduct($idProduct);
    
    /* Check if ratings of product */
    $starsElement = "";
    if($productRatings != null)
    {
        for($star = 1; $star <= $productRatings; $star++)
        {
            $starsElement .= "<i class='fas fa-star rating'></i>";
        }
    }else{
        $starsElement = "<i>(".trans('message.product_not_ratings').")</i>";
    }
    return $starsElement;
}

function showRatingCurrentUser($idProduct)
{
    $starsElement = "";
    if(Auth::check())
    {
        $idCurrentUser = Auth::user()->id;
        $starUserRatings = Rating::scopeGetStarUserRating($idProduct, $idCurrentUser);
        if($starUserRatings != null)
        {
            for($star = 1; $star <= $starUserRatings; $star++)
            {
                $starsElement .= "<i class='fas fa-star rating'></i>";
            }
        }else{
            $starsElement = "<i>(".trans('message.user_not_ratings').")</i>";
        }
    }
    return $starsElement;
}
?>