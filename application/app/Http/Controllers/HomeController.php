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

    public function index()    
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

    public function show()
    {
        //
    }
}
