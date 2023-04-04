<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        // $products = DB::table('products')->get(); 

        $products = Product::all();
        return view('home',['products'=>$products]);
    }

    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $products = new Product;

        $img = $request->file('image')->store('public/assets/images/products');
        $data['image'] =str_replace("public/assets/images/products", "storage/assets/images/products", $img);

        // $img =str_replace("public/assets/images/products", "storage/assets/images/products", $img);


        $user = Auth::user();
        $product = $user->products()->create($data);

        return back()
        ->with('success', 'saved succsefuly');
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
