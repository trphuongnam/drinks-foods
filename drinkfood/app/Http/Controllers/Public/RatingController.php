<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Rating;
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
                return ['msg'=>__('message.thank_rating'), 'star'=>$request->star];
            }else return ['msg'=>__('message.err_rating')];

        }else{
            return ['msg'=>__('message.err_rating')];
        }     
    }
}
