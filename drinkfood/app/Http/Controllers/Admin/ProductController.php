<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductManageRequest;
use Illuminate\Support\Str;
use App\LibraryStrings\Strings;
use Illuminate\Support\Facades\Auth;
use App\Services\UploadFileService;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->strings = new Strings;
    }

    public function index(Request $request)
    {
        $condition = [['status','=',1]];
        if($request->status != 0) $condition = [['status', '=', $request->status]];
        else $condition = [];
        if($request->filled('content')) array_push($condition, ['name', 'LIKE','%'.$request->content.'%']);
        if($request->type != 0) array_push($condition, ['type', '=', $request->type]);
        if($request->category != 0) array_push($condition, ['id_cat', '=', $request->category]);

        $products = Product::orderBy('id', 'desc')->where($condition)->paginate(10);
        return view('admin.pages.products.product', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::getCategoryChangeType(1);
        return view('admin.pages.products.product_add', ['categories' => $categories]);
    }

    public function store(ProductManageRequest $request, UploadFileService $uploadFileService)
    {
        $products = $request->except('_token');
        $products['uid'] = $this->strings->rand_string();
        $products['url_key'] = Str::slug($request->name);
        $products['id_user_created'] = Auth::user()->id;
        $products['id_cat'] = $request->category;

        if($request->hasFile('image'))
        {
            $pathSaveFile = public_path("uploads/images/products");
            $products['image'] = $uploadFileService->UploadImage($request, $request->file('image'), $pathSaveFile);
        }

        $saveProduct = Product::create($products);
        if($saveProduct) return redirect()->back()->with('save_success', __('product_lang.save_success'));
        else return redirect()->back()->with('save_error', __('product_lang.save_error'));
    }

    public function show($uidProduct)
    {
        $product = Product::scopeProductDetail($uidProduct);
        return view('admin.pages.products.product_detail', ['product'=>$product]);
    }

    public function edit($uid)
    {
        $product = Product::scopeProductInfo($uid);
        $categories = Category::getCategoryChangeType($product[0]->type);
        return view('admin.pages.products.product_edit', ['categories'=>$categories, 'product'=>$product]);
    }

    public function update(ProductManageRequest $request, UploadFileService $uploadFileService,$uid)
    {
        $products = $request->except(['_method', '_token', 'category']);
        $products['url_key'] = Str::slug($request->name);
        $products['id_cat'] = $request->category;
        
        if($request->hasFile('image'))
        {
            $pathSaveFile = public_path("uploads/images/products");
            $products['image'] = $uploadFileService->UploadImage($request, $request->file('image'), $pathSaveFile);
        }
        
        $updateProduct = Product::where('uid', $uid)->update($products);
        if($updateProduct) return redirect()->route('product.index')->with('update_success', __('product_lang.update_success')); 
        else return redirect()->back()->with('update_error', __('product_lang.update_error'));
    }

    public function destroy($uid)
    {
        $deleteProduct = Product::where('uid', $uid)->delete();
        if($deleteProduct == true) return redirect()->back()->with('delete_success', __('product_lang.delete_success'));
        else return redirect()->back()->with('delete_error', __('product_lang.delete_error'));
    }

    /* function display category when user change type */
    public function getCategoryWithType($type)
    {
        return Category::getCategoryChangeType($type);
    }
}
