<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryManageRequest;
use App\LibraryStrings\Strings;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->strings = new Strings;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $condition = [];
        if($request->filled('content')) array_push($condition, ['name', '=', $request->content]);
        if($request->has('type') && $request->type != 0) array_push($condition, ['type', '=', $request->type]);
        if($request->has('status') && $request->status != 0) array_push($condition, ['status', '=', $request->status]);

        $categories = Category::orderBy('type', 'ASC')->where($condition)->paginate(10);
        return view('admin.pages.categories.category', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.category_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryManageRequest $request)
    {
        $category = $request->except('__token');
        $category['uid'] = $this->strings->rand_string();
        $category['url_key'] = Str::slug($request->name);
        $category['id_user_created'] = Auth::user()->id;

        $saveCategory = Category::create($category);
        if($saveCategory) return redirect()->back()->with('save_success', __('category_lang.save_success'));
        else return redirect()->back()->withInput();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $category = Category::where('uid', $uid)->get();
        return view('admin.pages.categories.category_edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryManageRequest $request, $uid)
    {
        $category = $request->except(['_method', '_token']);
        $category['url_key'] = Str::slug($request->name);

        DB::beginTransaction();
        try {
            Category::where('uid', $uid)->update($category);
            
            /* Update status product of category*/
            $product['status'] = $request->status;
            Product::where('id_cat', $request->id)->update($product);
            DB::commit();
            return redirect()->route('category.index')->with('update_success', __('category_lang.update_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('update_error', __('category_lang.update_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        $deleteCat = Category::where('uid', $uid)->delete();
        if($deleteCat) return redirect()->back()->with('delete_success', __('category_lang.delete_success'));
        else return redirect()->back()->with('delete_error', __('category_lang.delete_error'));
    }

    public function changeStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $category['status'] = $request->status;
            $statusUpdate = Category::where('uid', $request->uidCategory)->update($category);
            $idCat = Category::where('uid', $request->uidCategory)->value('id');
            
            /* Update status product of category*/
            $product['status'] = $request->status;
            Product::where('id_cat', $idCat)->update($product);
            DB::commit();
            return ['sttUpdate' => true, 'message'=>trans_choice('message.hidden', $request->status)];
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['sttUpdate' => false, 'message'=>trans_choice('message.hidden', $request->status)];
        }
        
        
    }

    public function showProduct(Request $request)
    {
        $products = Category::with('product')->find($request->idCategory);

        $product = "";
        for($i = 0; $i < count($products->product); $i++)
        {

            $product .= "<div class='info-box mb-3 bg-success'><span class='info-box-icon'><img src='".productImage($products->product[$i]->image)."'/></span>
                            <div class='info-box-content'><span class='info-box-text'>".$products->product[$i]->name."</span>
                            <span class='info-box-number'>".number_format($products->product[$i]->price, 0, '', ',')." VND</span></div>
                        </div>";
        }

        $content = ['title' => $products->name, 'product' => $product, 'footer'=> $products->created_at];
        return $content;
    }
}
