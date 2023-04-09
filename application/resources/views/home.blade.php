@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="text-center m-5">
        <h2>welcom in Home page</h2>
    </div>

      <br> --}}


      {{-- {{dd($categories);}} --}}
{{-- {{dd($products);}} --}}
{{-- {{dd($locations);}} --}}

    <form action="" method="get" class="form-inline">
        <div class="row">  
            <div class="col-md-4">
                <label for="">Filter by categories</label>
                <div class="form-group">
                    <select class="form-control" name="category">
                        <option>choose the category</option>
                        @foreach($categories as $category)
                            <option value={{$category->id}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>            
            <div class="col-md-4">
                <label for="">Filter by cities</label>
                <div class="form-group">
                    <select class="form-control" name="city">
                        <option>Choose the City</option>
                        @foreach($locations as $location)
                            <option value={{$location->id}}>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">  
                <label for="">Search for</label>    
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Search" aria-describedby="search-bar">
                    <button class="btn btn-outline-secondary" type="button" id="search-bar"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
    </form>
      
    <div class="d-flex justify-content-between mt-5">
        <div class='h3'>
            <u>List of Products :</u> 
        </div>
        <div class="">
            <button class="addProductButton btn-rounded  rounded-pill"><a href="#modal" data-bs-toggle="modal" type="button"  class="btn-rounded px-4 rounded-pill">Add Product</a></button>
        </div>
    </div>
    <hr>

        <div class="row">
            @foreach($products as $product)            
            <div class="col-sm-4 mt-4">
                <div class="card">
                    <div class="mt-3 product_image_border">
                        <img class="card-img-top product-image" src="{{ asset("$product->image") }}" alt="book">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> <b> {{ $product->name }} </b></h5>
                        {{-- <p class="card-text">{{$product->description}}</p> --}}
                        <p class="card-text" title="{{$product->description}}">{{ \Illuminate\Support\Str::limit($product->description, $limit = 40, $end = '...') }}</p>
                        <a href="#" class="btn btn-info text-white">Exchange now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

    
    {{-- ========================================== modal - create =========================================--}}
    
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('products.store') }}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input  type="text" class="@error('name') error-border @enderror form-control" name="name" id="name"/>                            
                            @error('name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="@error('description') error-border @enderror form-control" name="description" id="description"></textarea>
                            @error('description')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>      
                        <div class="mb-3">
                            <label class="form-label">image</label> 
                            <input type="file" class="@error('image') error-border @enderror form-control" id="inputGroupFile04" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            @error('image')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="@error('status') error-border @enderror form-control" name="status_id" id="status">
                                <option value="1">select the status of this product</option>
                                @foreach($statuses as $status)
                                    <option value={{$status->id}}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="@error('category') error-border @enderror form-control" name="category_id" id="category">
                                <option>select the category of this product</option>
                                @foreach($categories as $category)
                                    <option value={{$category->id}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Location</label>
                            <select class="@error('location') error-border @enderror form-control" name="location_id" id="location">
                                <option>Choose your location</option>
                                @foreach($locations as $location)
                                    <option value={{$location->id}}>{{ $location->name }}</option>
                                @endforeach
                            </select>
                            @error('location')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="save"   class="btn btn-primary" id="save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
@endsection 
