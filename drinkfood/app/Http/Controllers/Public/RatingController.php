<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    function storeRatings(Request $request)
    {
        if(Auth::check() == true)
        {
            $rating = $request->all();
            $rating['id_user'] = Auth::user()->id;

            $storeRating = Rating::updateOrCreate(["id_user" => Auth::user()->id, "id_product"=>$request->id_product],$rating);
            if($storeRating) 
            {
                $this->updateAverageRatingProduct($request->id_product);
                return ['msg'=>__('message.thank_rating'), 'star'=>$request->star];
            }else return ['msg'=>__('message.err_rating')];

        }else{
            return ['msg'=>__('message.err_rating')];
        }     
    }
                
    private function updateAverageRatingProduct($idProduct)
    {
        $allRatingProduct = Rating::where('id_product', $idProduct)->get();

        $totalStarProduct = 0;
        if(count($allRatingProduct) > 0)
        {
            for($i = 0; $i < count($allRatingProduct); $i++)
            {
                $totalStarProduct += $allRatingProduct[$i]['star'];
            }
            $averageStars = round($totalStarProduct/count($allRatingProduct));
        }

        $product = Product::find($idProduct);
        $product->stars = $averageStars;
        $product->save();
    }
}
