<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\SearchAspect;
use Spatie\Searchable\ModelSearchAspect;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchterm = $request->input('search');
        if($searchterm != null)
        {
            $searchResults = (new Search())
            /* Config columns in categories table*/
            ->registerModel(Category::class, ['name', 'description'])
            /* Config columns in products table*/
            ->registerModel(Product::class,  ['name', 'description'])
            ->perform($searchterm);

        return view('public.pages.result_search', ['searchResult' => $searchResults]);
        }else{
            return back();
        }
        
    }
}
