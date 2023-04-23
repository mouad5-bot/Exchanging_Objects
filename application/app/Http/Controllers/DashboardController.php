<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Status;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $products = Product::all(); //->with('categories', 'status')->get();
        $categories = Category::all();
        $locations = Location::all();
        $statuses = Status::all();

        return view('dashboard/index', 
        [
            'products'=> $products,
            'categories' => $categories,
            'locations' => $locations,
            'statuses' => $statuses,
        ]);
    }
}
