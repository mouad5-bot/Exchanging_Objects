<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
        return view('home',['products'=>$products]);
    }

    public function profile()
    {
        //  $products = Product::all();
        // return view('users/profile',['products'=>$products]);
    }
}
