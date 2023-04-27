<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(StoreCategoryRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        if($user->cannot('edit category')){
            return back()
            ->with('error', 'You don\'t have right access');
        }

        $categories = new Category;

        $category = Category::create($data);

        return back()
        ->with('success', 'Your category has been added succssefully');        
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        $categories = Category::all();


        return view('dashboard.pages.editCategory', ['category' => $category]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
