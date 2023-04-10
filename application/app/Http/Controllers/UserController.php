<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserNameRequest;
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

    public function show($user)
    {
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

    public function update(UpdateUserNameRequest $request, User $user)
    { 
        $data = $request->validated();

        $user = Auth::user();
        
        $user->update($data);

        return back()
            ->with('success', 'Your name has been changed succssefully');
    }


    public function updatePassword(Request $request, User $user)
    {         
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // $user->password = bcrypt($request->input('password'));

        return back()
            ->with('success', 'Password has been changed successfully!');
    }

    public function destroy($id)
    {
        //
    }
}
