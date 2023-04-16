@php
    // dd($categories);
    // dd($locations);
    // dd($products);    
@endphp

    <div class="col-md-3">
        <label for="">Filter by categories</label>
        <div class="form-group">
            <input wire:model="filter" type="search" class="form-control" >
                {{-- <option value="">choose the category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach --}}
            {{-- </input> --}}
        </div>
    </div>            
    <div class="col-md-3">
        <label for="">Filter by cities</label>
        <div class="form-group">
            <input  wire:model="search"  class="form-control">
                {{-- <option value="">Choose the City</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach --}}
            {{-- </input> --}}
        </div>
    </div>
    <div class="col-md-2">
        {{-- <button wire:click="resetFilter">reset</button> --}}
    </div>
    <div class="col-md-4">  
        <form action="{{ url('search') }}" method="GET" role="search">
                <label for="">Search for</label>    
                <div class="input-group mb-3">
                    <input type="text" name="search" value="" class="form-control" placeholder="Search ..." aria-label="Search" aria-describedby="search-bar">
                    <button class="btn btn-outline-secondary" type="button" id="search-bar"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    
    
    <div class="d-flex justify-content-between mt-3">
        <div class='h3'>
            <u>List of Products :</u> 
        </div>
        <div class="">
            <button class="addProductButton btn-rounded  rounded-pill"><a href="#modal" data-bs-toggle="modal" type="button"  class="btn-rounded px-4 rounded-pill"> <i class="bi bi-plus"></i> Add Product</a></button>
        </div>
    </div>
    <hr>

    <div class="row">
        @foreach($products as $product)            
        <div class="col-sm-4 mt-2">
            <div class="card">
                <div class="mt-3 product_image_border">
                    <img class="card-img-top product-image" src="{{ asset("$product->image") }}" alt="book">
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <b> {{ $product->name }} </b></h5>
                    <p class="card-text text-secondary" title="{{$product->description}}">{{ \Illuminate\Support\Str::limit($product->description, $limit = 40, $end = '...') }}</p>
                    <hr>
                    <div class="d-flex justify-content-center ">
                      <a href="#" class="btn btn-light object scale text-black border border-dark me-3"> <span><i class="bi bi-arrow-down-up me-1"></i></span> Exchange now</a>
                      <a href="{{ route('chatify', [$product->user_id]) }}" class="btn btn-dark object scale text-white"> <span> <i class="bi bi-messenger"></i> </span> Send message </a>
                     
                      
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
