<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductPicture;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        $products = Product::select('product.id', 'product_pict.name as picture_name',
         'product.name as product_name', 'product.price')
        ->join('product_category', 'product_category.id', '=' , 'product.id_category' )
        ->join('product_pict', 'product_pict.id_product', '=', 'product.id')
        ->where('product_pict.status', '1')
        ->get();
        
        return view('user.product', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function category(string $id)
    {
        $categories = ProductCategory::all();
        $products = Product::select('product.id', 'product_pict.name as picture_name', 'product.name as product_name', 'product.price')
        ->join('product_category', 'product_category.id', '=' , 'product.id_category' )
        ->leftJoin('product_pict', 'product_pict.id_product', '=', 'product.id')
        ->where('product_category.id',$id)
        ->where('product_pict.status', '1')
        ->get();
        return view('user.product', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::select(
            'product.id' ,'product_pict.name as picture_name', 
            'product.name as product_name', 'product.price', 'product.stock', 'product.desc')
        ->join('product_category', 'product_category.id', '=' , 'product.id_category' )
        ->join('product_pict', 'product_pict.id', '=', 'product.id')
        ->where('product.id',$id)
        ->get();
        $product_pics = ProductPicture::where('product_pict.id_product', $id)->get();
        $main_pics = ProductPicture::where('product_pict.id_product', $id)->first();
        $product_types = ProductType::where('product_type.id_product', $id)->get();
        return view('user.detail_product', compact('products','product_pics', 'product_types', 'main_pics'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
