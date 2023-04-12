<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productFilterController extends Controller
{
    public function filter(Request $request)
    {    
        $product_query = Product::with(['category','location']);

        if ($request->category) {

            $dataOfCategory = $request->category;

            $product_query->whereHas('category', function($products) use($dataOfCategory){
                $products->where('name', 'like', '%' . $dataOfCategory . '%');
            });
        }
    
        if ($request->location) {
            
            $data = $request->location;
            
            $product_query->whereHas('location', function ($products) use ($data) {
                $products->where('name', 'like', '%' . $data . '%');
            });
            
        }
    
        $products = $product_query->get();
        // return response()->json([
        //     'data'=>$products,
        // ], 200);
        return view('home', ['products' => $products]);

    }
}
