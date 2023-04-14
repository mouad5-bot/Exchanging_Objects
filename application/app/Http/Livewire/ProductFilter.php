<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;

class ProductFilter extends Component
{    
    public $filter;
    public $search = 'youssoufia';
 
    protected $queryString = ['search', 'filter'];  

    public $categories, $category_id;
    public $locations,  $name, $location_id;
    public $products;

    public function render()
    {
        $this->categories = Category::all();
        $this->locations = Location::all();
        $this->products = Product::all();

        $dataOfCat = $this->filter;
     

        return view('livewire.product-filter', [
            // 'products' => Product::whereHas('categories', function($query) use($dataOfCat){
            //             $query->where('category_id', $dataOfCat);
            //         })->get(),

            'products' => Product::search('name', $this->search.'%')->paginate(10),

        ]);
    }


    // public $categories, $category_id;
    // public $locations,  $name, $location_id;
    // public $products;

    // public function render()
    // {
    //     $this->categories = Category::all();
    //     $this->locations = Location::all();
    //     $this->products = Product::all();

        // if ($this->categories) {
        //     $dataOfCat = $this->categories;

        //     $query = Product::with(['categories']);

        //     $query->whereHas('categories', function($query) use($dataOfCat){
        //         $query->where('category_id', $dataOfCat);
        //     });
        // }

        // $query = Product::with(['categories', 'locations']);

        // if ($this->categories) {
        //     $query->where('category_id', $this->categories);
        // }

        // if ($this->locations) {
        //     $query->where('location_id', $this->locations);
        // }

    //     $products = $query->get();

    //     return view('livewire.product-filter');
    // }
    
    // public function resetFilter()
    // {
    //     $this->categories = null;
    //     $this->locations = null;
    // }
}