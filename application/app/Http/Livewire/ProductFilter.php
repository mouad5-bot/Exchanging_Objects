<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;

class ProductFilter extends Component
{    
    public $categories, $category_id;
    public $locations,  $name, $location_id;
    public $products;

    public function render()
    {
        $this->categories = Category::all();
        $this->products = Product::all();
    
        $query = Product::query();
    
        if ($this->categories->isNotEmpty()) {
            $categoryIds = $this->categories->pluck('id');
            $query->whereHas('categories', function($query) use($categoryIds){
                $query->whereIn('id', $categoryIds);
            });
        }
    
        $products = $query->get();
    
        return view('livewire.product-filter', [
            'products' => $products,
        ]);
    }
    
    // public function render()
    // {
    //     $this->categories = Category::all();
        // $this->locations = Location::all();
        // $this->products = Product::all();

        
        // if ($this->categories) {
        //     $dataOfCat = $this->categories;

        //     $query = Product::with(['categories']);

        //     $query->whereHas('categories', function($query) use($dataOfCat){
        //         $query->where('Category_id', $dataOfCat);
        //     });
        // }

        // if ($this->categories) {
        //     $query->where('category_id', $this->categories);
        // }

        // if ($this->locations) {
        //     $query->where('location_id', $this->locations);
        // }

        // $products = $query->get();

        // return view('livewire.product-filter');
    // }
    
    public function resetFilter()
    {
        $this->categories = null;
        $this->locations = null;
    }
}