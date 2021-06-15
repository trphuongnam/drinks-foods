<?php
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

function showRating($idProduct)
{
    $productRatings = Rating::scopeGetRatingProduct($idProduct);
        
    $totalRatings = 0;
    $averageRating = 0;
    $starsElement = "";

    /* Check if ratings of product */
    if(count($productRatings) > 0)
    {
        for($i = 0; $i < count($productRatings); $i++)
        {
            $totalRatings += $productRatings[$i]["star"];
        }

        /* Average rating of product */
        $averageRating = round($totalRatings/count($productRatings));

        for($star = 1; $star <= $averageRating; $star++)
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