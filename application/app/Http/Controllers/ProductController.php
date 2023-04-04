<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {
        
        // dd($request->all());

        $data = $request->validated();

        $products = new Product;

        $img = $request->file('image')->store('public/assets/images/products');
        // $img =str_replace("public/assets/images/products", "storage/assets/images/products", $img);
        $data['image'] =str_replace("public/assets/images/products", "storage/assets/images/products", $img);

        // $products->name = $request->input('name');
        // $products->description = $request->input('description');
        // $products->image = $img; 
        // $products->status = $request->input('status');
        // $products->category_id = $request->input('category_id'); 
        // $products->location_id = $request->input('location_id');

        $user = Auth::user();
        $product = $user->products()->create($data);
        
        // $products->user_id = $user->id;
        // dd($product, $data);
        
        // dd($products);

        // $products->save();

        return back()
        ->with('success', 'saved succsefuly');
    }

    public function show(Product $product)
    {
        //
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
