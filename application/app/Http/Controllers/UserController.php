<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    // public function index()
    // {        
    //     $products = Product::all();
    //     return view('users/profile',['products'=>$products]);
    // }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        // $products = Product::all();
        // $products = Product::with('categories')->get();
        // $products = Product::with('categories', 'status')->get();

        // $user = Auth::user();
        // $products = $user->products()->get();

        $user = Auth::user();
        $products = $user->products()->with('categories', 'status')->get();

        // dd($products);
        return view('users/profile', ['products'=> $products]);
    }
    
    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request )
    { 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return back()
            ->with('success', 'saved succesfuly');
    }
    public function updatePassword(User $user, Request $request )
    { 
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user->password = bcrypt($request->input('password'));

        $user->save();

        return back()
            ->with('success', 'saved succesfuly');
    }


    public function destroy($id)
    {
        //
    }
}
