<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Status;
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

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $products = new Product;

        $img = $request->file('image')->store('public/assets/images/products');
        $data['image'] =str_replace("public/assets/images/products", "storage/assets/images/products", $img);

        $user = Auth::user();
        $product = $user->products()->create($data);

        return back()
        ->with('success', 'Your product has been added succssefully');
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    public function edit($id)
    {   
        $products = Product::with('categories', 'status', 'locations')->findOrFail($id);
        $categories = Category::all();
        $locations = Location::all();
        $statuses = Status::all();


        return view('users.editProduct', [
            'product' => $products,
            'categories' => $categories,
            'locations' => $locations,
            'statuses' => $statuses,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->all());

        $data = $request->validated();

        $user = Auth::user();

        if ($product->user_id != $user->id) {
            return redirect()->back()->with('error', "You don't have permission to edit this product");
        }
        
        if ($request->hasFile('image')) {
            $img = $request->file('image')->store('public/assets/images/products');
            $data['image'] = str_replace("public/assets/images/products", "storage/assets/images/products", $img);
        } else {
            $data['image'] = $product->image;
        }
        
        $product->update($data);

        // return  redirect()->route('users/profile')->with('success', 'Product updated successfully');
        return redirect()->route('users/profile', $user)->with('success', 'Product has been  updated successfully');

    }

    public function destroy(Product $product)
    {        
        $product-> delete();
        return redirect()
        ->back()
        ->with('success', 'product has been deleted !!');
    }

    public function exchange($productId)
    {
        $user = Auth::user();
        $products = $user->products()->with('categories', 'status')->get();        
        $categories = Category::all();
        $locations = Location::all();
        $statuses = Status::all();

        $product = Product::find($productId);

        return view('products/exchange', 
        [
            'product' => $product,
            'products' => $products,
            'categories' => $categories,
            'locations' => $locations,
            'statuses' => $statuses,
        ]);
    }

    public function ConfermExchanging(Request $request)
    {
        // Retrieve the user's selected product and the product they want to exchange it for
        $product = Product::findOrFail($request->input('product_id'));
        $exchangeProduct = Product::findOrFail($request->input('exchange_product_id'));

        // Create a new exchange request
        $exchange = new Exchange;
        $exchange->user_id = auth()->user()->id;
        $exchange->product_id = $product->id;
        $exchange->exchange_product_id = $exchangeProduct->id;
        $exchange->status = 'pending';
        $exchange->save();

        // Notify the other user about the exchange request
        $exchangeProduct->user->notify(new ExchangeRequest($exchange));

        // Redirect the user back to the product listing page
        return redirect()->route('products.index')->with('success', 'Exchange request sent!');
    }

    

}
