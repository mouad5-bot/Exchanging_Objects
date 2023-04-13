<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)    
    {
        $products = Product::all();
        $categories = Category::all();
        $locations = Location::all();
        $locations = Location::all();
        $statuses = Status::all();


        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'locations' => $locations,
            'statuses' => $statuses,
        ]);
    }

    public function searchProduct(Request $request){        
        if($request->search){
            $searchProduct = Product::where('name', 'LIKE', '%' .$request->search. '%')->latest()->paginate(5);
            return view('products.search',  ['searchProduct' => $searchProduct]);
        }else{
            return redirect()->back()->with('message', 'The search bar is empty !');
        }
    }

    public function FilterProduct(Request $request)
    {
        $product_query = Product::with(['categories','locations']);

        if ($request->category) {

            $dataOfCategory = $request->categories;

            $product_query->whereHas('categories', function($products) use($dataOfCategory){
                $products->where('name', 'like', '%' . $dataOfCategory . '%');
            });
        }
    
        if ($request->location) {
            
                $data = $request->locations;
            
                $product_query->whereHas('locations', function ($products) use ($data) {
                $products->where('name', 'like', '%' . $data . '%');
            });
            
        }
    
        $products = $product_query->get();        
    }
}
